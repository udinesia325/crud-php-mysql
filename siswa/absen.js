const tblHapus=document.getElementsByClassName('hapus');
for (let i = 0; i < tblHapus.length; i++) {
  tblHapus[i]
    .addEventListener("click",function(){
      const id = this.dataset.hapus
      const kelas = this.dataset.kelas
      document.location.href= `hapusSiswa.php?id=${id}&kelas=${kelas}`
    })
}
