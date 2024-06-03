async function solicitar() {
    await fetch("http://localhost:8000/api/publicaciones")
    .then(response => response.json())
    .then(data => console.log(data))
}