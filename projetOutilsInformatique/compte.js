// définir la longueur du captcha
let captchaLength = 6;

// fonction pour générer un code aléatoire
function generateCode(length) {
  let code = '';
  let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789$£/?;.';
  for (let i = 0; i < length; i++) {
    code += characters.charAt(Math.floor(Math.random() * characters.length));
  }
  return code;
}

// fonction pour dessiner le captcha
function drawCaptcha(code) {
  let canvas = document.getElementById('captcha');
  let ctx = canvas.getContext('2d');
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.font = '55px Times New Roman';
  ctx.fillStyle = '#Ff7700';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillText(code, canvas.width / 2.2, canvas.height / 1.85);
}

function refreshCaptcha() {
    let code = generateCode(captchaLength);
    drawCaptcha(code);
  }

// générer le code et dessiner le captcha
let currentCode = generateCode(captchaLength);
drawCaptcha(code);

// fonction pour vérifier si le code entré est correct
function verifyCaptcha(x) {
  let input = document.getElementById(x).value;

  if(input == currentCode){
    alert('Captcha correct!');
    // réinitialiser le captcha
    currentCode = generateCode(captchaLength);
    drawCaptcha(currentCode);
  } 
  else{
    alert("Captcha incorrect ! Veuillez réessayer.");
    // réinitialiser le captcha
    currentCode = generateCode(captchaLength);
    drawCaptcha(currentCode);
  }
}

