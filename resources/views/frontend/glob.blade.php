<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Add this to your Laravel Blade view -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script type="module" src="{{ asset('frontend/js/world.js') }}"></script>
    <script src="{{ asset('frontend/js/systems/loop.js') }}"></script>
    <script src="{{ asset('frontend/js/components/camera.js') }}"></script>
    <script src="{{ asset('frontend/js/systems/renderer.js') }}"></script>
    <script src="{{ asset('frontend/js/components/scene.js') }}"></script>
    <title>Document</title>
</head>
<div id="globe-container"></div>

<!-- Initialize and start the globe -->
<script>
  const world = new World('globe-container');
  world.start();
</script>

</body>
</html>