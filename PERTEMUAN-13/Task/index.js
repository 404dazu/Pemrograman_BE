const express = require("express");
const app = express();
const port = 3000;
const { Sequelize } = require("sequelize");
const routes = require("./routes/api");
app.use(express.json());
async function main() {
  const sequelize = new Sequelize("sekolah", "root", "", {
    host: "localhost",
    dialect: "mysql",
  });
  try {
    await sequelize.authenticate();
    console.log("Connection has been ok");
  } catch (error) {
    console.error("Connection error");
  }
  routes(app);
  app.listen(port, () => {
    console.log(`Running at http://localhost:${port}`);
  });
}
main();
