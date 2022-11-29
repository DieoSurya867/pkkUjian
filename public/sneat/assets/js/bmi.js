class Age {
    constructor(yob) {
        this.yob = yob;
    }
    hitungUmur() {
        let yearsNow = new Date().getFullYear();
        this.age = parseInt(yearsNow) - parseInt(this.yob);
        return parseInt(this.age);
    }
}

class Consul extends Age {
    constructor(yob, result) {
        super(yob);
        this.result = result;
    }

    checkConsul() {
        let age = parseInt(super.hitungUmur());
        if (age >= 17 && age <= 30 && this.result > 29.9) {
            return "Gratis Konsultasi";
        } else if (age > 30 && this.result > 29.9) {
            return "Obat Gratis";
        } else {
            return `Tidak Memenuhi Syarat`;
        }
    }
}

// Free Medicine if Age >= 30 dan Obesitas

const checkResult = (result) => {
    let status = "";
    if (result < 18.5) {
        status = "Kurus";
    } else if (result < 22.9) {
        status = "Normal";
    } else if (result <= 29.9) {
        status = "Gemuk";
    } else if (result > 29.9) {
        status = "Obesitas";
    } else {
        status = "Nilai Anda Salah!";
    }

    return status;
};

const yearList = () => {
    let yearsNow = new Date().getFullYear();
    let option = "";
    for (let i = yearsNow; i > 1800; i--) {
        option += `<option value="${i}">${i}</option>`;
    }
    $("#yob").append(option);
};

const checkHobby = () => {
    let hobbies = $("#hobbies").val();
    let hobby = hobbies.split(",");
    if (hobby.length < 3) {
        $("#hobbies").val("Masukkan Hobby Minimal 3");
    } else {
        let random = Math.floor(Math.random() * hobby.length);
        $("#hobbyResult").val(hobby[random]);
    }
};

$(document).ready(function () {
    yearList();
});

$("#checkBmi").click(function () {
    let result = $("#weight").val() / (($("#height").val() / 100) ^ 2);
    let nowConsul = new Consul($("#yob").val(), result);

    $("#nameResult").val($("#name").val());
    $("#heightResult").val($("#height").val());
    $("#weightResult").val($("#weight").val());
    $("#statusResult").val(checkResult(result));
    checkHobby();
    $("#ageResult").val(nowConsul.hitungUmur());
    $("#freeConsultationResult").val(nowConsul.checkConsul());
});
