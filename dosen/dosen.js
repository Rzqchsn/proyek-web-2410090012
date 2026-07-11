const dataDosen = [
    {
        nidn: "0123456789",
        nama: "Dr. Andi Wijaya, M.Kom.",
        prodi: "Informatika",
        email: "andi@kampus.ac.id",
        telepon: "081234567890"
    },
    {
        nidn: "0234567890",
        nama: "Siti Rahma, M.Kom.",
        prodi: "Sistem Informasi",
        email: "siti@kampus.ac.id",
        telepon: "081298765432"
    },
    {
        nidn: "0345678901",
        nama: "Budi Santoso, M.T.",
        prodi: "Teknik Komputer",
        email: "budi@kampus.ac.id",
        telepon: "081377788899"
    }
];

const tabelDosen = document.getElementById("data-dosen");

dataDosen.forEach(function(dosen, index) {
    const baris = document.createElement("tr");

    baris.innerHTML = 
        <td>${index + 1}</td>
        <td>${dosen.nidn}</td>
        <td>${dosen.nama}</td>
        <td>${dosen.prodi}</td>
        <td>${dosen.email}</td>
        <td>${dosen.telepon}</td>
    ;

    tabelDosen.appendChild(baris);
});