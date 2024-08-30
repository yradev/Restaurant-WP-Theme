// vite.config.js
import { defineConfig } from "file:///D:/Server/restaurant/wp-content/themes/WP-Custom-Theme/node_modules/vite/dist/node/index.js";
import ViteSassGlobImport from "file:///D:/Server/restaurant/wp-content/themes/WP-Custom-Theme/node_modules/vite-plugin-sass-glob-import/dist/index.mjs";
import liveReload from "file:///D:/Server/restaurant/wp-content/themes/WP-Custom-Theme/node_modules/vite-plugin-live-reload/dist/index.js";
import externalGlobals from "file:///D:/Server/restaurant/wp-content/themes/WP-Custom-Theme/node_modules/vite-plugin-external-globals/lib/index.js";
var __vite_injected_original_dirname = "D:\\Server\\restaurant\\wp-content\\themes\\WP-Custom-Theme";
var vite_config_default = defineConfig({
  base: "./",
  build: {
    outDir: "dist",
    rollupOptions: {
      input: [
        "assets/js/main.js",
        "assets/scss/main.scss"
      ]
    },
    manifest: true
  },
  server: {
    host: "localhost",
    port: 5e3
  },
  plugins: [
    // {
    //   name: 'custom-transform-jquery',
    //   transform(code) {
    //     return code.replace(/\$\(/g, 'jQuery(');
    //   },
    // },
    // {
    //   name: 'custom-transform-ajax',
    //   transform(code) {
    //     return code.replace(/\$\./g, 'jQuery.');
    //   }
    // },
    liveReload(__vite_injected_original_dirname + "/**/**.php"),
    ViteSassGlobImport(),
    externalGlobals({
      jquery: "jQuery"
      // This maps the import to the global jQuery object provided by WordPress
    })
  ]
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJEOlxcXFxTZXJ2ZXJcXFxccmVzdGF1cmFudFxcXFx3cC1jb250ZW50XFxcXHRoZW1lc1xcXFxXUC1DdXN0b20tVGhlbWVcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZmlsZW5hbWUgPSBcIkQ6XFxcXFNlcnZlclxcXFxyZXN0YXVyYW50XFxcXHdwLWNvbnRlbnRcXFxcdGhlbWVzXFxcXFdQLUN1c3RvbS1UaGVtZVxcXFx2aXRlLmNvbmZpZy5qc1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9pbXBvcnRfbWV0YV91cmwgPSBcImZpbGU6Ly8vRDovU2VydmVyL3Jlc3RhdXJhbnQvd3AtY29udGVudC90aGVtZXMvV1AtQ3VzdG9tLVRoZW1lL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XHJcbmltcG9ydCBWaXRlU2Fzc0dsb2JJbXBvcnQgZnJvbSAndml0ZS1wbHVnaW4tc2Fzcy1nbG9iLWltcG9ydCc7XHJcbmltcG9ydCBsaXZlUmVsb2FkIGZyb20gJ3ZpdGUtcGx1Z2luLWxpdmUtcmVsb2FkJ1xyXG5pbXBvcnQgZXh0ZXJuYWxHbG9iYWxzIGZyb20gJ3ZpdGUtcGx1Z2luLWV4dGVybmFsLWdsb2JhbHMnO1xyXG5cclxuZXhwb3J0IGRlZmF1bHQgZGVmaW5lQ29uZmlnKHtcclxuXHRiYXNlOiAnLi8nLFxyXG4gIGJ1aWxkOiB7XHJcbiAgICBvdXREaXI6ICdkaXN0JywgXHJcbiAgICByb2xsdXBPcHRpb25zOiB7XHJcbiAgICAgIGlucHV0OiBbXHJcbiAgICAgICAgJ2Fzc2V0cy9qcy9tYWluLmpzJyxcclxuICAgICAgICAnYXNzZXRzL3Njc3MvbWFpbi5zY3NzJyxcclxuICAgICAgXSxcclxuICAgIH0sXHJcbiAgICBtYW5pZmVzdDogdHJ1ZSxcclxuICB9LFxyXG4gIHNlcnZlcjoge1xyXG4gICAgaG9zdDogJ2xvY2FsaG9zdCcsIFxyXG4gICAgcG9ydDogNTAwMCxcclxuICB9LFxyXG4gIHBsdWdpbnM6IFtcclxuICAgIC8vIHtcclxuICAgIC8vICAgbmFtZTogJ2N1c3RvbS10cmFuc2Zvcm0tanF1ZXJ5JyxcclxuICAgIC8vICAgdHJhbnNmb3JtKGNvZGUpIHtcclxuICAgIC8vICAgICByZXR1cm4gY29kZS5yZXBsYWNlKC9cXCRcXCgvZywgJ2pRdWVyeSgnKTtcclxuICAgIC8vICAgfSxcclxuICAgIC8vIH0sXHJcbiAgICAvLyB7XHJcbiAgICAvLyAgIG5hbWU6ICdjdXN0b20tdHJhbnNmb3JtLWFqYXgnLFxyXG4gICAgLy8gICB0cmFuc2Zvcm0oY29kZSkge1xyXG4gICAgLy8gICAgIHJldHVybiBjb2RlLnJlcGxhY2UoL1xcJFxcLi9nLCAnalF1ZXJ5LicpO1xyXG4gICAgLy8gICB9XHJcbiAgICAvLyB9LFxyXG4gICAgbGl2ZVJlbG9hZChfX2Rpcm5hbWUgKyAnLyoqLyoqLnBocCcpLFxyXG4gICAgVml0ZVNhc3NHbG9iSW1wb3J0KCksXHJcbiAgICBleHRlcm5hbEdsb2JhbHMoe1xyXG4gICAgICBqcXVlcnk6ICdqUXVlcnknLCAvLyBUaGlzIG1hcHMgdGhlIGltcG9ydCB0byB0aGUgZ2xvYmFsIGpRdWVyeSBvYmplY3QgcHJvdmlkZWQgYnkgV29yZFByZXNzXHJcbiAgICB9KSxcclxuICBdLFxyXG59KTtcclxuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUFnVyxTQUFTLG9CQUFvQjtBQUM3WCxPQUFPLHdCQUF3QjtBQUMvQixPQUFPLGdCQUFnQjtBQUN2QixPQUFPLHFCQUFxQjtBQUg1QixJQUFNLG1DQUFtQztBQUt6QyxJQUFPLHNCQUFRLGFBQWE7QUFBQSxFQUMzQixNQUFNO0FBQUEsRUFDTCxPQUFPO0FBQUEsSUFDTCxRQUFRO0FBQUEsSUFDUixlQUFlO0FBQUEsTUFDYixPQUFPO0FBQUEsUUFDTDtBQUFBLFFBQ0E7QUFBQSxNQUNGO0FBQUEsSUFDRjtBQUFBLElBQ0EsVUFBVTtBQUFBLEVBQ1o7QUFBQSxFQUNBLFFBQVE7QUFBQSxJQUNOLE1BQU07QUFBQSxJQUNOLE1BQU07QUFBQSxFQUNSO0FBQUEsRUFDQSxTQUFTO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUEsSUFhUCxXQUFXLG1DQUFZLFlBQVk7QUFBQSxJQUNuQyxtQkFBbUI7QUFBQSxJQUNuQixnQkFBZ0I7QUFBQSxNQUNkLFFBQVE7QUFBQTtBQUFBLElBQ1YsQ0FBQztBQUFBLEVBQ0g7QUFDRixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
