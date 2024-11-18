<html>
<head>
    <meta charset="utf-8">
    <title>Three.js Globe</title>
    <style>
        body { margin: 0; }
        canvas { display: block; }
    </style>
</head>
<body>
    <script src="https://threejs.org/build/three.js"></script>
    <script>
        // Set up the scene, camera, and renderer
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);

        // Create the globe geometry
        const geometry = new THREE.SphereGeometry(2, 32, 32);

        // Load the globe texture
        const textureLoader = new THREE.TextureLoader();
        const texture = textureLoader.load('https://unpkg.com/three-globe/example/img/earth-night.jpg');

        // Create the material with the texture
        const material = new THREE.MeshBasicMaterial({ map: texture });

        // Create the globe mesh
        const globe = new THREE.Mesh(geometry, material);

        // Add the globe to the scene
        scene.add(globe);

        // Position the camera
        camera.position.z = 5;

        // Add ambient light to the scene
        const ambientLight = new THREE.AmbientLight(0x404040);
        scene.add(ambientLight);

        // Add directional light to the scene
        const directionalLight = new THREE.DirectionalLight(0xffffff);
        directionalLight.position.set(1, 1, 1).normalize();
        scene.add(directionalLight);

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            globe.rotation.y += 0.005;
            renderer.render(scene, camera);
        }

        // Start the animation loop
        animate();
    </script>
</body>
</html>
