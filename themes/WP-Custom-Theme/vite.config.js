import { defineConfig } from 'vite';
import ViteSassGlobImport from 'vite-plugin-sass-glob-import';
import { viteExternalsPlugin } from 'vite-plugin-externals';
import path from 'path';

const ROOT = path.resolve('../../../..');
const themeDir = path.relative(ROOT, '').split('\\')[0];

export default defineConfig({
  base: './',
  build: {
    outDir: 'dist',
    rollupOptions: {
      input: [
        path.resolve('assets/js/main.js'),
        path.resolve('assets/scss/main.scss'),
      ],
    },
    manifest: true,
  },
  server: {
    port: 8500,
    open: true,
    proxy: {
      '/': {
        target: `http://localhost/${themeDir}`,
        changeOrigin: true,
        configure: (proxy, options) => {
          proxy.on('proxyReq', (proxyReq, req, res) => {
            const proxyPath = proxyReq.path;

            proxyReq.setHeader('Dev-Mode', 'true');

            if (!proxyPath.endsWith('/') && !proxyPath.match(/(\.[A-z]+)$/)) {
              proxyReq.path += '/';
            }
          });
        },
        bypass: function (req) {
          if (req.url.startsWith('/assets/') 
            || req.url.startsWith('/@vite/')
            || req.url.startsWith('/node_modules/')) {
            return req.url; 
          }
        },
      },
      '/wp-admin': {
        target: `http://localhost/${themeDir}`,
        changeOrigin: true,
      },
    },
  },
  plugins: [
    ViteSassGlobImport(),
    viteExternalsPlugin({
      jquery: 'jQuery',
    }),
    {
      name: 'php',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({ type: 'full-reload' });
        }
      },
    },
  ],
  resolve: {
    alias: {
      '$': 'jquery',
    },
  },
});
