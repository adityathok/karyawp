// vite.config.js
import { resolve } from 'path'
import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'assets',
    minify: 'esbuild',
    lib: {
      entry: resolve(__dirname, 'src/js/main.js'),
      name: 'karyawp',
      fileName: 'karyawp', 
      formats: ['es', 'cjs']
    },
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name == 'style.css')
            return 'karyawp.css';
          return assetInfo.name;
        },
      }
    }
  }
})
