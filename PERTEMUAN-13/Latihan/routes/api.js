const studentController = require("./../Controller/StudentController");

const routes = (app) => {
  app.get("/", (req, res) => {
    res.status(200).json({
      status: 200,
      message: "Oke",
    });
  });

  // Routes
  app.get("/student", studentController.findAll);
  app.get("/student/:id", studentController.findOne);
  app.post("/student", studentController.store);
  app.put("/student/:id", studentController.update);
  app.delete("/student/:id", studentController.destroy);

  return app;
};

module.exports = routes;
