<template>
  <div class="p-6 max-w-md mx-auto bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Pagamento</h2>
    <form @submit.prevent="enviarPagamento">
      <div class="mb-4">
        <label class="block mb-1">Pedido ID</label>
        <input v-model="form.pedido_id" type="number" class="border rounded w-full px-3 py-2" required />
      </div>
      <div class="mb-4">
        <label class="block mb-1">Valor</label>
        <input v-model="form.valor" type="number" step="0.01" class="border rounded w-full px-3 py-2" required />
      </div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
    </form>

    <div v-if="resposta" class="mt-4 p-3 bg-green-100 text-green-800 rounded">
      <pre>{{ resposta }}</pre>
    </div>
    <div v-if="erro" class="mt-4 p-3 bg-red-100 text-red-800 rounded">
      <pre>{{ erro }}</pre>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const form = ref({
  pedido_id: '',
  valor: ''
})
const resposta = ref(null)
const erro = ref(null)

const enviarPagamento = async () => {
  resposta.value = null
  erro.value = null
  try {
    const res = await fetch('/api/pagamentos', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(form.value)
    })
    if (!res.ok) throw await res.json()
    resposta.value = await res.json()
  } catch (e) {
    erro.value = e
  }
}
</script>
