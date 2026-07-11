<script setup>

import { reactive, ref } from 'vue';
import { formService } from '@/services/api';

const name = ref("");
const birthday = ref("");
const email = ref("");
const phone = ref("");
const isLoading = ref(false);

let informations = reactive({
  name: name,
  birthday: birthday,
  email: email,
  phone: phone
})

async function handleSubmit() {
  if (!informations.name || !informations.birthday || !informations.email || !informations.phone) {
    alert("Please fill in all fields.")
    return
  }

  isLoading.value = true;

  try {
    const response = await formService.send(informations)
    alert("OK Got It ;)", response.data);

    informations = {
      name: '',
      birthday: '',
      email: '',
      phone: ''
    }
  } catch (err) {
    alert("Your request was not sent.", err)
  }
  finally {
    isLoading.value = false;
  }
}

</script>

<template>

  <form class="info" @submit.prevent="handleSubmit">
    <label for="name">Name:</label>
    <input v-model="name" type="text" name="name" required> <br>

    <label for="birthday">Birthday:</label>
    <input v-model="birthday" type="date" name="birthday" required> <br>

    <label for="email">Email:</label>
    <input v-model="email" type="email" name="email" required> <br>

    <label for="phone">Phone:</label>
    <input v-model="phone" type="tel" name="phone" required> <br>

    <button>Send</button>
  </form>
  
</template>


<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.info {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  padding: 40px 50px;
  border-radius: 24px;
  box-shadow:
    0 20px 60px rgba(0, 0, 0, 0.15),
    0 0 0 1px rgba(255, 255, 255, 0.5) inset,
    0 0 0 2px rgba(200, 180, 160, 0.1);
  max-width: 450px;
  width: 90%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.info:hover {
  transform: translateY(-5px);
  box-shadow:
    0 30px 80px rgba(0, 0, 0, 0.2),
    0 0 0 1px rgba(255, 255, 255, 0.6) inset;
}

.info label {
  display: block;
  font-size: 14px;
  font-weight: 600;
  color: #4a3f3a;
  margin-bottom: 6px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  font-size: 12px;
  opacity: 0.8;
}

.info input {
  width: 100%;
  padding: 12px 16px;
  margin-bottom: 18px;
  border: 2px solid #e8e0d8;
  border-radius: 12px;
  font-size: 15px;
  background: #faf8f6;
  transition: all 0.3s ease;
  color: #2d2a27;
  outline: none;
  font-family: inherit;
}

.info input:focus {
  border-color: #f5a623;
  background: #ffffff;
  box-shadow: 0 0 0 4px rgba(245, 166, 35, 0.15);
  transform: scale(1.01);
}

.info input:hover {
  border-color: #d4c8be;
  background: #ffffff;
}

.info input::placeholder {
  color: #b5aaa2;
  opacity: 0.7;
}

.info br {
  display: none;
}

.info button {
  width: 100%;
  padding: 14px;
  background: linear-gradient(135deg, #f5a623, #f7c948);
  border: none;
  border-radius: 12px;
  color: white;
  font-size: 17px;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  letter-spacing: 1px;
  text-transform: uppercase;
  box-shadow: 0 4px 15px rgba(245, 166, 35, 0.3);
  margin-top: 8px;
  font-family: inherit;
}

.info button:hover {
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 8px 25px rgba(245, 166, 35, 0.45);
  background: linear-gradient(135deg, #f7c948, #f5a623);
}

.info button:active {
  transform: scale(0.98);
  box-shadow: 0 2px 10px rgba(245, 166, 35, 0.2);
}

.info label:after {
  content: " ✨";
  opacity: 0.5;
  font-size: 12px;
}

@media (max-width: 480px) {
  .info {
    padding: 30px 25px;
    width: 95%;
  }

  .info input {
    padding: 10px 14px;
    font-size: 14px;
  }

  .info button {
    font-size: 15px;
    padding: 12px;
  }
}
</style>
