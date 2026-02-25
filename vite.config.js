import { defineConfig } from 'vite';

export default defineConfig(({ command }) => {
  const isDev = command === 'serve';

  return {
    base: isDev ? '/' : './',

    build: {
      outDir: 'dist',
      emptyOutDir: true,
      manifest: true,
      sourcemap: true,
      rollupOptions: {
        input: './src/js/main.js',
      },
    },

     server: {
      host: '0.0.0.0',
      port: 5173,
      strictPort: true,
      hmr: {
        host: 'localhost',
      },
    },

    css: {
      devSourcemap: true,
      preprocessorOptions: {
        scss: {
          silenceDeprecations: ['legacy-js-api'],
        },
      },
    },
  };
});
