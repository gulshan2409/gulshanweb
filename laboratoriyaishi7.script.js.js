// Dark Mode toggle
function toggleDark() {
    document.body.classList.toggle("dark");
    let enabled = document.body.classList.contains("dark");
    // Cookie 7 kun saqlash
    document.cookie = "darkmode=" + (enabled ? "dark" : "") + "; max-age=" + (60 * 60 * 24 * 7) + "; path=/";
}

// Grayscale toggle
function toggleGray() {
    document.body.classList.toggle("grayscale");
    let enabled = document.body.classList.contains("grayscale");
    // Cookie 7 kun saqlash
    document.cookie = "grayscale=" + (enabled ? "grayscale" : "") + "; max-age=" + (60 * 60 * 24 * 7) + "; path=/";
}