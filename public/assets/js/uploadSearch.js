const uploadSearchInp = document.querySelector("[name=search-pdf]")
const uploadSearchBtn = document.querySelector(".search-pdf-btn")
const searchForm = document.querySelector('.search-pdf-form')
const uploadedFilesBody = document.querySelector(".uploaded-files-tbody")
const uploadedFiles = Array.from(document.querySelectorAll(".uploaded-files-tbody tr"))

function searchPDF(e) {
    e.preventDefault()
    const searchedPDF = uploadSearchInp.value.toLowerCase().trim()

    if (searchedPDF == "") {
        uploadedFiles.forEach(file => {
            file.classList.remove("hidden")
        })
        return
    }

    uploadedFiles.forEach(file => {
        if (!file.innerText.toLowerCase().includes(searchedPDF)) {
            file.classList.add("hidden")
        }
    })
}
uploadSearchBtn.addEventListener('click', searchPDF)
searchForm.addEventListener('submit', searchPDF)



