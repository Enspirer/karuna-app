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

window.addEventListener('DOMContentLoaded', () => {
    const viewAudios = document.querySelectorAll('.ach-audio-thumbnail')
    const audioViewer = document.getElementById('achAudioViewer')

    audioViewer.addEventListener('click', () => {
        audioViewer.classList.remove('show')
    })

    viewAudios.forEach((audio) => {
        const audioSource = audio.querySelector('[ach-audio-view="true"]')
        const audioSrc = audioSource.getAttribute('src')

        audio.addEventListener('click', () => {
            audioViewer.innerHTML = `<audio controls><source src="${audioSrc}" type="audio/mpeg"></audio>`
            audioViewer.classList.add('show')
        })
    })
})
