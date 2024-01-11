class StudentController {
  index(req, res) {
    res.send("Menampilkan semua students");
  }

  store(req, res) {
    res.send("Menambahkan data Student");
  }

  update(req, res) {
    const { id } = req.params;
    res.send(`Mengedit student id${id}`);
  }

  destroy(req, res) {
    const { id } = req.params;
    res.send(`Menghapus student id${id}`);
  }
}

const object = new StudentController();

module.exports = object;
