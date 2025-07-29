@extends('layout')

@section('titulo', 'Comandos por Señas (Video)')

@section('contenido')
<h2 class="text-center mb-4">🎥 Señales Manuales para Agregar Producto</h2>

<video id="video" width="320" height="240" autoplay muted style="border:1px solid #ccc"></video>
<p id="output" class="text-center my-3">Esperando gesto...</p>

<form id="videoForm" method="POST" action="{{ route('comando.video.procesar') }}">
    @csrf
    <input type="hidden" name="comando" id="comandoInput">
</form>

@if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger text-center">{{ session('error') }}</div>
@endif

<a href="{{ route('home') }}" class="btn btn-secondary">← Volver</a>

<script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js"></script>

<script>
const video = document.getElementById('video');
const output = document.getElementById('output');
const input = document.getElementById('comandoInput');

const hands = new Hands({
  locateFile: (file) => `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`
});

hands.setOptions({
  maxNumHands: 1,
  modelComplexity: 1,
  minDetectionConfidence: 0.7,
  minTrackingConfidence: 0.7
});

hands.onResults(onResults);

const camera = new Camera(video, {
  onFrame: async () => {
    await hands.send({image: video});
  },
  width: 320,
  height: 240
});
camera.start();

function onResults(results) {
  if (results.multiHandLandmarks && results.multiHandLandmarks.length > 0) {
    const hand = results.multiHandLandmarks[0];

    // Puntos importantes:
    const thumbTip = hand[4];    // Pulgar punta
    const indexTip = hand[8];    // Índice punta
    const middleTip = hand[12];  // Medio punta

    // Distancia pulgar - índice (para agregar)
    const distAgregar = Math.hypot(indexTip.x - thumbTip.x, indexTip.y - thumbTip.y);

    // Distancia índice - medio (para eliminar)
    const distEliminar = Math.hypot(indexTip.x - middleTip.x, indexTip.y - middleTip.y);

    // Umbrales a ajustar para que sea más fiable
    const UMBRAL_AGREGAR = 0.2;
    const UMBRAL_ELIMINAR = 0.15;

    if (distAgregar > UMBRAL_AGREGAR) {
      output.innerText = '🖐️ Gesto detectado: Agregar producto';
      input.value = 'agregar';
    } 
    else if (distEliminar > UMBRAL_ELIMINAR) {
      output.innerText = '✌️ Gesto detectado: Eliminar producto';
      input.value = 'eliminar';
    } 
    else {
      output.innerText = '✊ Mano cerrada o gesto no reconocido';
      input.value = '';
    }

    if (!window.envioHecho && (input.value === 'agregar' || input.value === 'eliminar')) {
      window.envioHecho = true;
      setTimeout(() => {
        document.getElementById('videoForm').submit();
      }, 1000);
    }
  } else {
    output.innerText = '🕵️ No se detecta mano';
    input.value = '';
  }
}
</script>
@endsection
