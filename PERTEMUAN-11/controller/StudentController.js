const students = require("../data/student.js");
class StudentController {
  index(req, res) {
    const data = {
      message: "Menampilkan semua students",
      data: [students],
    };
    res.json(data);
  }

  store(req, res) {
    const { nama } = req.body;
    const data = {
      message: `Menambahakan data student: ${nama}`,
      data: [students],
    };
    res.json(data);
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;
    const data = {
      message: `Mengedit student id${id}, nama${nama}`,
      data: [students],
    };
    res.json(data);
  }

  destroy(req, res) {
    const { id } = req.params;
    const data = {
      message: `Menghapus student id${id}`,
      data: [students],
    };
    res.json(data);
  }
}

const object = new StudentController();

module.exports = object;
