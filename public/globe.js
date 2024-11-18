import*as e from"three";import{OrbitControls as t}from"three/addons/controls/OrbitControls.js";
let vertex=`
  #ifdef GL_ES
  precision mediump float;
  #endif

  uniform float u_time;
  uniform float u_maxExtrusion;

  void main() {

    vec3 newPosition = position;
    if(u_maxExtrusion > 1.0) newPosition.xyz = newPosition.xyz * u_maxExtrusion + sin(u_time);
    else newPosition.xyz = newPosition.xyz * u_maxExtrusion;

    gl_Position = projectionMatrix * modelViewMatrix * vec4( newPosition, 1.0 );

  }
`,fragment=`
  #ifdef GL_ES
  precision mediump float;
  #endif

  uniform float u_time;

  vec3 colorA = vec3(0.196, 0.631, 0.886);
  vec3 colorB = vec3(0.192, 0.384, 0.498);

  void main() {

    vec3  color = vec3(0.0);
    float pct   = abs(sin(u_time));
          color = mix(colorA, colorB, pct);

    gl_FragColor = vec4(color, 1.0);

  }
`,container=document.querySelector(".container-globe"),canvas=document.querySelector(".canvas-1"),sizes,scene,camera,renderer,controls,raycaster,mouse,isIntersecting,twinkleTime,materials,material,baseMesh,minMouseDownFlag,mouseDown,grabbing,setScene=()=>{sizes={width:container.offsetWidth,height:container.offsetHeight},scene=new e.Scene,(camera=new e.PerspectiveCamera(30,sizes.width/sizes.height,1,1e3)).position.set(-50,0,100),(renderer=new e.WebGLRenderer({canvas:canvas,antialias:!1,alpha:!0})).setPixelRatio(Math.min(window.devicePixelRatio,2));let t=new e.PointLight(16777215,17,200);t.position.set(-50,0,60),scene.add(t),scene.add(new e.HemisphereLight(16777215,16777215,1.5)),raycaster=new e.Raycaster,mouse=new e.Vector2,isIntersecting=!1,minMouseDownFlag=!1,mouseDown=!1,grabbing=!1,setControls(),setBaseSphere(),setShaderMaterial(),setMap(),resize(),listenTo(),render()},setControls=()=>{(controls=new t(camera,renderer.domElement)).autoRotate=!0,controls.autoRotateSpeed=6,controls.enableDamping=!0,controls.enableRotate=!0,controls.enablePan=!1,controls.enableZoom=!1,controls.minPolarAngle=Math.PI/2-.5,controls.maxPolarAngle=Math.PI/2+.5},setBaseSphere=()=>{let t=new e.SphereGeometry(19.5,35,35),n=new e.MeshStandardMaterial({color:16119285,transparent:!0,opacity:.9});baseMesh=new e.Mesh(t,n),scene.add(baseMesh)},setShaderMaterial=()=>{twinkleTime=.03,materials=[],material=new e.ShaderMaterial({side:e.DoubleSide,uniforms:{u_time:{value:1},u_maxExtrusion:{value:1}},vertexShader:vertex,fragmentShader:fragment})},setMap=()=>{let t={},n=e=>{for(let n=0,o=-180,i=90;n<e.length;n+=4,o++){t[i]||(t[i]=[]);let r=e[n],s=e[n+1],a=e[n+2];r>100&&s>100&&a>100&&t[i].push(o),180===o&&(o=-180,i--)}},o=(e,n)=>{let o=!1;if(!t[n].length)return o;let i=t[n].reduce((t,n)=>Math.abs(n-e)<Math.abs(t-e)?n:t);return .5>Math.abs(e-i)&&(o=!0),o},i=(t,n)=>{var o=(90-n)*(Math.PI/180),i=(t+180)*(Math.PI/180);let r=-(20*Math.sin(o)*Math.cos(i)),s=20*Math.sin(o)*Math.sin(i),a=20*Math.cos(o);return new e.Vector3(r,a,s)},r=e=>{let t=material.clone();return t.uniforms.u_time.value=e*Math.sin(Math.random()),materials.push(t),t},s=()=>{let t=new e.Vector3;for(let n=90,s=0;n>-90;n--,s++){let a=20*Math.cos(Math.abs(n)*(Math.PI/180)),l=a*Math.PI*2,c=1.5*l;for(let m=0;m<c;m++){let u=-180+360*m/c;if(!o(u,n))continue;t=i(u,n);let $=new e.CircleGeometry(.1,5);$.lookAt(t),$.translate(t.x,t.y,t.z);let d=r(s),f=new e.Mesh($,d);scene.add(f)}}},a=new Image;a.onload=()=>{a.needsUpdate=!0;let e=document.createElement("canvas");e.width=a.width,e.height=a.height;let t=e.getContext("2d");t.drawImage(a,0,0);let o=t.getImageData(0,0,e.width,e.height);n(o.data),s()},a.src="/public/img/world_alpha_mini-min.jpg"},resize=()=>{sizes={width:container.offsetWidth,height:container.offsetHeight},window.innerWidth>700?camera.position.z=100:camera.position.z=70,camera.aspect=sizes.width/sizes.height,camera.updateProjectionMatrix(),renderer.setSize(sizes.width,sizes.height)},mousemove=e=>{isIntersecting=!1,mouse.x=e.clientX/window.innerWidth*2-1,mouse.y=-(2*(e.clientY/window.innerHeight))+1,raycaster.setFromCamera(mouse,camera);let t=raycaster.intersectObject(baseMesh);t[0]?(isIntersecting=!0,grabbing||(document.body.style.cursor="pointer")):grabbing||(document.body.style.cursor="default")},mousedown=()=>{isIntersecting&&(materials.forEach(e=>{gsap.to(e.uniforms.u_maxExtrusion,{value:1.07})}),mouseDown=!0,minMouseDownFlag=!1,setTimeout(()=>{minMouseDownFlag=!0,mouseDown||mouseup()},500),document.body.style.cursor="grabbing",grabbing=!0)},mouseup=()=>{mouseDown=!1,minMouseDownFlag&&(materials.forEach(e=>{gsap.to(e.uniforms.u_maxExtrusion,{value:1,duration:.15})}),grabbing=!1,isIntersecting?document.body.style.cursor="pointer":document.body.style.cursor="default")},listenTo=()=>{window.addEventListener("resize",resize.bind(this)),window.addEventListener("mousemove",mousemove.bind(this)),window.addEventListener("mousedown",mousedown.bind(this)),window.addEventListener("mouseup",mouseup.bind(this))},render=()=>{materials.forEach(e=>{e.uniforms.u_time.value+=twinkleTime}),controls.update(),renderer.render(scene,camera),requestAnimationFrame(render.bind(this))};setScene();