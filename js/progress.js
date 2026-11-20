function markSlideAsViewed(poiId, link) {
    const lesson = document.body.dataset.lesson || "unbekannt";

    fetch('../save_progress.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ lesson: lesson, poi_id: poiId, link: link })
    })
        .then(response => response.json())
        .then(data => {
            if (data.completed) {
                const poiEl = document.querySelector(`[data-id="${poiId}"]`);
                if (poiEl) {
                    poiEl.setAttribute("material", "color: green; opacity: 1");
                }
            }
            if (data.percent !== undefined) {
                updateProgressBar(data.percent);
            }
        })
        .catch(err => {
            console.error("❌ Fehler beim Speichern des Fortschritts:", err);
        });
}

function showCompletionPopup() {
    const popup = document.getElementById("completion-popup");
    if (popup) popup.style.display = "block";
}

function updateProgressBar(progressPercent) {
    const progressBar = document.getElementById("progress-bar");
    if (progressBar) progressBar.style.width = progressPercent + "%";

    if (progressPercent >= 95) {
        showCompletionPopup();
    }
}

// Globale Funktion für den Schließen-Button im Pop-up
window.closeCompletionPopup = function () {
    const popup = document.getElementById("completion-popup");
    if (popup) popup.style.display = "none";
};

console.log("✅ progress.js wurde geladen");
