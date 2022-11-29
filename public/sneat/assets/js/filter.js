class Posisi {
    constructor(terbit) {
        this.terbit = terbit;
    }
    ruang() {
        if (this.terbit < 2000) {
            return "Ruang 1";
        } else if (this.terbit >= 2000) {
            return "Ruang 2";
        } else {
            return "Nilai jumlah salah";
        }
    }

    rak(jumlah) {
        if (jumlah < 200) {
            return "Rak 1";
        } else if (jumlah >= 200) {
            return "Rak 2";
        } else {
            return "Nilai Terbit Tidak Terpenuhi";
        }
    }
}

class keterangan extends Posisi {
    constructor(terbit) {
        super(terbit);
    }

    kelangkaan() {
        if (this.terbit >= 2000) {
            return "Buku Modern";
        } else if (this.terbit > 1900) {
            return "Cukup Langka";
        } else {
            return "Buku Sangat Langka";
        }
    }
}

function hitung() {
    $("#judulResult").val($("#judul").val());
    $("#jumlahResult").val($("#jumlah").val());
    $("#terbitResult").val($("#terbit").val());

    let ruangan = new Posisi($("#terbit").val());
    $("#ruanganResult").val(ruangan.ruang());

    let diRak = new Posisi($("#terbit").val());
    $("#rakResult").val(diRak.rak($("#jumlah").val()));

    let rare = new keterangan($("#terbit").val());
    $("#rareResult").val(rare.kelangkaan());
}
