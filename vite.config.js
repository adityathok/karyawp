// vite.config.js
import { resolve } from 'path'
import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'assets',
    minify: 'esbuild',
    lib: {
      entry: resolve(__dirname, 'src/js/main.js'),
      name: 'zahro',
      fileName: 'zahro', 
      formats: ['es', 'cjs']
    },
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name == 'style.css')
            return 'zahro.css';
          return assetInfo.name;
        },
      }
    }
  }
})
