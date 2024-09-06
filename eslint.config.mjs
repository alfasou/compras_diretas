import globals from 'globals';
import pluginJs from '@eslint/js';
import tseslint from 'typescript-eslint';
import someConfig from 'some-other-config-you-use';
import eslintConfigPrettier from 'eslint-config-prettier';

export default [
  { root: true },
  { parser: '@typescript-eslint/parser' },
  { files: ['**/*.{js,mjs,cjs,ts}'] },
  { languageOptions: { globals: globals.browser } },
  { plugins: ['@typescript-eslint', 'prettier'] },
  {
    extends: [
      'eslint:recommended',
      'plugin:@typescript-eslint/recommended',
      'prettier',
    ],
  },
  { rules: { 'prettier/prettier': 2 } },
  pluginJs.configs.recommended,
  ...tseslint.configs.recommended,
  someConfig,
  eslintConfigPrettier,
];
