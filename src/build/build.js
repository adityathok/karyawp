import * as fs from 'node:fs/promises';
import {join} from 'path';
import zipdir from 'zip-dir';
import {deleteAsync} from 'del';

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

deleteAsync(['dist','assets/zahro.cjs']).then( async() => {
    console.log('delete folder dist');
    copyDir("./", "./dist/zahro").then(() => {  
        console.log('copy folder dist'); 
        zipdir("./dist/zahro", { saveTo: "./dist/zahro.zip" });
        console.log('create zahro.zip');
    });
});

