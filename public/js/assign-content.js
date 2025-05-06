document.addEventListener('DOMContentLoaded', function () {
    const monitorSelect = document.getElementById('monitor_id');
    const modelSelect = document.getElementById('product_model_id');
    const instructionSelect = document.getElementById('work_instructions');

    function filterModelsByLine(lineId) {
        Array.from(modelSelect.options).forEach(option => {
            const matches = option.dataset.lineId === lineId;
            option.hidden = !matches && option.value !== "";
        });
        modelSelect.value = "";
    }

    function filterInstructionsByModel(modelId) {
        Array.from(instructionSelect.options).forEach(option => {
            const matches = option.dataset.modelId === modelId;
            option.hidden = !matches && option.value !== "";
        });
        instructionSelect.value = "";
    }

    monitorSelect?.addEventListener('change', function () {
        const selected = this.selectedOptions[0];
        if (selected && selected.dataset.lineId) {
            filterModelsByLine(selected.dataset.lineId);
            instructionSelect.value = "";
            Array.from(instructionSelect.options).forEach(opt => opt.hidden = true);
        }
    });

    modelSelect?.addEventListener('change', function () {
        const selectedModelId = this.value;
        if (selectedModelId) {
            filterInstructionsByModel(selectedModelId);
        }
    });
});
