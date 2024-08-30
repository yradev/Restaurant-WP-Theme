import { defineConfig } from 'vite';
import ViteSassGlobImport from 'vite-plugin-sass-glob-import';
import liveReload from 'vite-plugin-live-reload'
import { viteExternalsPlugin } from 'vite-plugin-externals'

export default defineConfig({
	base: './',
  build: {
    outDir: 'dist', 
    rollupOptions: {
      input: [
        'assets/js/main.js',
        'assets/scss/main.scss',
      ],
    },
    manifest: true,
  },
  server: {
    host: 'localhost', 
    port: 5000,
  },
  plugins: [
    liveReload(__dirname + '/**/**.php'),
    ViteSassGlobImport(),
    viteExternalsPlugin({
      jquery: 'jQuery', 
    }),
  ],
  resolve: {
    alias: {
      '$': 'jquery',  
    },
  },
});
