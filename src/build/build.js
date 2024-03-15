const { promises: fs } = require("fs");
const zipdir = require("zip-dir");
const path = require("path");
const join = path.join;
const del = require("del");

async function copyDir(src, dest) {
  await fs.mkdir(dest, { recursive: true });
  let entries = await fs.readdir(src, { withFileTypes: true });
  let ignore = [
    "node_modules",
    "dist",
    "src",
    ".git",
    ".github",
    ".browserslistrc",
    ".editorconfig",
    ".gitattributes",
    ".gitignore",
    ".vscode",
    ".jscsrc",
    ".jshintignore",
    ".travis.yml",
    "vite.config.js",
    "webpack.config.js",
    "composer.json",
    "composer.lock",
    "package.json",
    "package-lock.json",
    "phpcs.xml.dist",
    ".vscode",
  ];

  for (let entry of entries) {
    if (ignore.indexOf(entry.name) != -1) {
      continue;
    }
    let srcPath = join(src, entry.name);
    let destPath = join(dest, entry.name);

    entry.isDirectory()
      ? await copyDir(srcPath, destPath)
      : await fs.copyFile(srcPath, destPath);
  }
}

del(['dist','assets/karyawp.cjs']).then( async() => {
    console.log('delete folder dist');
    copyDir("./", "./dist/karyawp").then(() => {  
        console.log('copy folder dist'); 
        
        const packageJson = require("../../package.json");
        const version = packageJson.version;

        zipdir("./dist", { saveTo: `./dist/karyawp.${version}.zip` });
        console.log(`create karyawp.${version}.zip`);
    });
});

