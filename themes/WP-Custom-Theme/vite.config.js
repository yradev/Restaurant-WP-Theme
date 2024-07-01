import { defineConfig } from 'vite';
import { watchAndRun } from 'vite-plugin-watch-and-run'
import ViteSassGlobImport from 'vite-plugin-sass-glob-import';
import liveReload from 'vite-plugin-live-reload'

export default defineConfig({
	base: './',
  build: {
    outDir: 'dist', 
    rollupOptions: {
      input: [
        'assets/js/main.js',
        'assets/scss/main.scss',
      ]
    },
    manifest: true,
  },
  server: {
    host: '127.0.0.1', 
    port: 5000,
  },
  plugins: [
    {
      name: 'custom-transform',
      transform(code) {
        return code.replace(/\$\(/g, 'jQuery(');
    },
    },
    liveReload(__dirname + '/**/**.php'),
    ViteSassGlobImport(),
  ],
});
