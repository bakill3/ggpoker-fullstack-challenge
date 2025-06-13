document.addEventListener("DOMContentLoaded", () => {
  const referenciadoresList = document.getElementById("referenciadores-list");
  const addRefBtn = document.getElementById("addRefBtn");
  const form = document.getElementById("afiliadoForm");
  const jsonPreview = document.getElementById("jsonPreview");

  let refCount = 0;

  function createReferenciadorFields(usernameVal = '', percentVal = '') {
    refCount++;
    const group = document.createElement("div");
    group.className = "row align-items-end mb-2 ref-entry";
    group.innerHTML = `
      <div class="col-md-6">
        <input type="text" class="form-control" name="referenciadores[${refCount}][username]" placeholder="Username ou ID do referenciador" value="${usernameVal}" required>
      </div>
      <div class="col-md-4">
        <input type="number" class="form-control" name="referenciadores[${refCount}][percent]" min="0" max="100" step="0.01" placeholder="Percentagem (%)" value="${percentVal}" required>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-outline-danger btn-sm remove-ref">Remover</button>
      </div>
    `;
    referenciadoresList.appendChild(group);

    group.querySelector('.remove-ref').onclick = () => {
      group.remove();
      updateJsonPreview();
    };
  }

  addRefBtn.addEventListener("click", () => {
    createReferenciadorFields();
    updateJsonPreview();
  });


  // Update JSOn
  function updateJsonPreview() {
    const data = getFormData();
    jsonPreview.textContent = JSON.stringify(data, null, 2);
  }

  // Exctract form data
  function getFormData() {
    const data = {
      username: form.username.value,
      nickname: form.nickname.value,
      email: form.email.value,
      base_percentage: form.base_percentage.value,
      referenciadores: []
    };
    referenciadoresList.querySelectorAll('.ref-entry').forEach(group => {
      const username = group.querySelector('input[name*="[username]"]').value;
      const percent = group.querySelector('input[name*="[percent]"]').value;
      if (username && percent) {
        data.referenciadores.push({ username, percent });
      }
    });
    return data;
  }

  // Update preview
  form.querySelectorAll("input, select").forEach(input => {
    input.addEventListener("input", updateJsonPreview);
  });
  referenciadoresList.addEventListener("input", updateJsonPreview);

  // Update preview on adicionar/remover
  new MutationObserver(updateJsonPreview).observe(referenciadoresList, { childList: true, subtree: true });

  updateJsonPreview();
});