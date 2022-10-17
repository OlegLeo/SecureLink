
<!-- CSS only -->
<style>
  @import 'https://fonts.googleapis.com/css2?family=Goldman&display=swap';
html,
body {
  
  background-image: url("../img/utilizador/images/camera.jpg");

  background-position: center; /* Center the image */
  opacity: 85%;
  background-size: cover; /* Resize the background image to cover the entire container */
  height: 100%;
  background-color: white;
}
.text-change-container {
  height: 100%;
  width: 100%;
  justify-content: center;
  align-items: center;
  display: flex;
}
.text-change {
  font-family: 'Goldman', monospace;
  font-weight: normal;
  font-size: 35px;
  color: white;
  filter: drop-shadow(0 0 0.3em rgba(200,200,200,0.3));
}
.dud {
  color: rgba(200,30,30,0.8);
  filter: drop-shadow(0 0 0.5em #f00);
}
</style>
</head>
<body class="w3-black">


<div class="text-change-container" style="padding-top:550px ;">
  <div class="text-change"></div>
</div><div class="text-change-container">
  <div class="text-change"></div>

</div>

</body>
</html>


<?php 
//echo $_SERVER['HTTP_REFERER'];  //informs from what page it comes

// if gets this variable by url, it emits the message
if(isset($_GET['r'])){
  $r = $_GET['r'];
  if($r == 'deleteok'){ ?>

    <div class="alert alert-success" role="alert">
      Account has beed deleted succesfully!
    </div>

    <?php
  }
}?>



<script>
  class TextScramble {
  constructor(el) {
    this.el = el;
    this.chars = "!<>-_\\/[]{}—=+*^?#________";
    this.update = this.update.bind(this);
  }
  setText(newText) {
    const oldText = this.el.innerText;
    const length = Math.max(oldText.length, newText.length);
    const promise = new Promise(resolve => this.resolve = resolve);
    this.queue = [];
    for (let i = 0; i < length; i++) {
      const from = oldText[i] || "";
      const to = newText[i] || "";
      const start = Math.floor(Math.random() * 40);
      const end = start + Math.floor(Math.random() * 40);
      this.queue.push({ from, to, start, end });
    }
    cancelAnimationFrame(this.frameRequest);
    this.frame = 0;
    this.update();
    return promise;
  }
  update() {
    let output = "";
    let complete = 0;
    for (let i = 0, n = this.queue.length; i < n; i++) {
      let { from, to, start, end, char } = this.queue[i];
      if (this.frame >= end) {
        complete++;
        output += to;
      } else if (this.frame >= start) {
        if (!char || Math.random() < 0.28) {
          char = this.randomChar();
          this.queue[i].char = char;
        }
        output += `<span class="dud">${char}</span>`;
      } else {
        output += from;
      }
    }
    this.el.innerHTML = output;
    if (complete === this.queue.length) {
      this.resolve();
    } else {
      this.frameRequest = requestAnimationFrame(this.update);
      this.frame++;
    }
  }
  randomChar() {
    return this.chars[Math.floor(Math.random() * this.chars.length)];
  }}


const phrases = [
"SecureLink",
"Closed-circuit Television - CCTV",
"Your safety is OUR responsibility !",
];


const el = document.querySelector(".text-change");
const fx = new TextScramble(el);

let counter = 0;
const next = () => {
  fx.setText(phrases[counter]).then(() => {
    setTimeout(next, 2000);
  });
  counter = (counter + 1) % phrases.length;
};

next();
</script>