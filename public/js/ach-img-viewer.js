window.addEventListener('DOMContentLoaded', () => {
    const viewImgs = document.querySelectorAll('[ach-img-view="true"]')
    const imgViewer = document.getElementById('achImgViewer')
    const imgClose = imgViewer.querySelector('.img-close')
    const image = imgViewer.querySelector('img')

    imgClose.addEventListener('click', () => {
        imgViewer.classList.remove('show')
    })

    viewImgs.forEach((img) => {
        img.addEventListener('click', () => {
            const src = img.getAttribute('src')
            image.setAttribute('src', src)
            imgViewer.classList.add('show')
        })
    })
})
