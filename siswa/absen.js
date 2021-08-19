
function handleHapus() {
  const id = this.dataset.hapus
   // alert(this.dataset.hapus)
  document.querySelector(".popper")
  .style.transform = "scale(1)"
 let tombolHapus = document.querySelector(".hapus")
   tombolHapus.setAttribute("data-id",id)
  
  tombolHapus.addEventListener("click",function(){
    const id = this.dataset.id
    const kelas = this.dataset.kelas
    document.location.href=`hapusSiswa.php?id=${id}&kelas=${kelas}`
  })
 
}
document.querySelector(".batal").addEventListener("click",function(){
    this.parentElement.style.transform ="scale(0)"
})





//ambil semua elemen tombol hapus

let tblHapus = document.querySelectorAll("[data-hapus]");
for (let i = 0; i < tblHapus.length; i++) {
    tblHapus[i].addEventListener("click",handleHapus)
}



function handleEdit(){
  let kelas = this.dataset.kelas
  let idSiswa = this.dataset.edit
  document.location.href = `ubahSiswa.php?id=${idSiswa}&kelas=${kelas}`
}

//ambil semua tombol edit
let tblEdit = document.querySelectorAll("[data-edit]");
for (let i = 0; i < tblEdit.length; i++) {
    tblEdit[i].addEventListener("click",handleEdit)
}