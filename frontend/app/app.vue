<script setup>
import InformationForm from './components/InformationForm.vue';
</script>

<template>
  <div class="container">
    <div class="header">
      <h1>Hi dude! 👋</h1>
      <div class="decoration-line"></div>
      <h2>🎂 Enter your date of birth:</h2>
      <p class="subtitle">Let's celebrate your special day!</p>
    </div>
    <InformationForm />
    <div class="footer-text">
      <span>✨ We'll send you birthday surprises ✨</span>
    </div>
  </div>
</template>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.container {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  padding: 20px;
  position: relative;
  overflow: hidden;
}

.container::before {
  content: '🎈';
  position: absolute;
  top: 10%;
  left: 5%;
  font-size: 60px;
  opacity: 0.15;
  animation: float 6s ease-in-out infinite;
}

.container::after {
  content: '🎉';
  position: absolute;
  bottom: 10%;
  right: 5%;
  font-size: 70px;
  opacity: 0.15;
  animation: float 8s ease-in-out infinite reverse;
}

@keyframes float {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-20px) rotate(10deg); }
}

.header {
  text-align: center;
  margin-bottom: 30px;
  animation: slideDown 0.8s ease-out;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

h1 {
  font-size: 48px;
  font-weight: 800;
  background: linear-gradient(135deg, #f5a623, #f7c948, #f5a623);
  background-size: 200% 200%;
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: shimmer 3s ease-in-out infinite;
  margin-bottom: 10px;
  letter-spacing: -1px;
}

@keyframes shimmer {
  0%, 100% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
}

.decoration-line {
  width: 80px;
  height: 4px;
  background: linear-gradient(90deg, #f5a623, #f7c948);
  margin: 10px auto;
  border-radius: 2px;
  animation: expandWidth 1s ease-out;
}

@keyframes expandWidth {
  from { width: 0; }
  to { width: 80px; }
}

h2 {
  font-size: 28px;
  color: #4a3f3a;
  font-weight: 600;
  margin-top: 10px;
  letter-spacing: 0.5px;
}

.subtitle {
  font-size: 16px;
  color: #8a7e76;
  margin-top: 8px;
  font-weight: 400;
  opacity: 0.8;
  letter-spacing: 1px;
}

.footer-text {
  margin-top: 30px;
  font-size: 14px;
  color: #8a7e76;
  font-weight: 500;
  opacity: 0.7;
  letter-spacing: 1px;
  animation: fadeInUp 1s ease-out 0.5s both;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 0.7;
    transform: translateY(0);
  }
}

@media (max-width: 768px) {
  h1 {
    font-size: 36px;
  }

  h2 {
    font-size: 22px;
  }

  .subtitle {
    font-size: 14px;
  }

  .container::before,
  .container::after {
    font-size: 40px;
  }

  .container::before {
    top: 5%;
    left: 3%;
  }

  .container::after {
    bottom: 5%;
    right: 3%;
  }
}

@media (max-width: 480px) {
  h1 {
    font-size: 28px;
  }

  h2 {
    font-size: 18px;
  }

  .subtitle {
    font-size: 12px;
  }

  .footer-text {
    font-size: 12px;
  }
}
</style>