const { json } = require("sequelize");
const { Student } = require("../models");
const student = require("../models/student");

class StudentController {
  async findAll(req, res) {
    const students = await Student.findAll();

    return res.status(200).json({
      status: 200,
      message: "Oke",
      data: students,
    });
  }

  async findOne(req, res) {
    const { id } = req.params;
    const students = await Student.findAll({ where: { id: id } });

    if (!students.length) {
      return res.status(404).json({
        status: 404,
        message: "Data not found!",
      });
    }

    return res.status(200).json({
      status: 200,
      message: "ok",
      data: students[0],
    });
  }

  async store(req, res) {
    const student = await Student.create(req.body);

    return res.json({
      status: 201,
      message: "Menambahkan data student",
      data: student,
    });
  }

  async update(req, res) {
    try {
      const { id } = req.params;
      const students = await Student.findAll({ where: { id: id } });

      if (!students.length) {
        return res.status(404).json({
          status: 404,
          message: "Data not found",
        });
      }

      const student = await Student.update(req.body, {
        where: {
          id: id,
        },
      });

      return res.status(200).json({
        status: 200,
        message: "oke",
        data: student,
      });
    } catch (err) {
      return res.status(500).json({
        status: 500,
        message: `Internal server error: ${err.message}`,
      });
    }
  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.findByPk(id);

    if (student) {
      const condition = {
        where: {
          id: id,
        },
      };
      await Student.destroy(condition);

      const data = {
        message: "Data dihapus",
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "data tidak ada",
      };
      return res.status(404).json(data);
    }
  }
}

const studentController = new StudentController();

module.exports = studentController;
