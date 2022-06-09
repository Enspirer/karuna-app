window.addEventListener('DOMContentLoaded', () => {
    const viewVideos = document.querySelectorAll('.ach-video-thumbnail')
    const videoViewer = document.getElementById('achVideoViewer')

    videoViewer.addEventListener('click', () => {
        videoViewer.classList.remove('show')
    })

    viewVideos.forEach((vid) => {
        const videoSource = vid.querySelector('[ach-video-view="true"]')
        const videoSrc = videoSource.getAttribute('src')

        vid.addEventListener('click', () => {
            videoViewer.innerHTML = `<video controls><source src="${videoSrc}" type="video/mp4"></video>`
            videoViewer.classList.add('show')
        })
    })
})
