module.exports = {
  parser: require.resolve('babel-eslint'),
  parserOptions: {
    sourceType: 'module',
  },
  env: {
    browser: true,
    node: true,
    es6: true,
  },
  globals: {},
  rules: {
    quotes: ['error', 'single'],
    'no-cond-assign': ['error', 'except-parens'],
    curly: 'error',
    eqeqeq: 'error',
    'no-eq-null': 'error',
    'wrap-iife': ['error', 'any'],
    'no-use-before-define': 'error',
    'new-cap': 'error',
    'no-caller': 'error',
    'dot-notation': 'error',
    'no-undef': 'error',
    'no-unused-vars': 'error',
    'no-const-assign': 'error',
    'prefer-const': 'error',
    'no-var': 'error',
    'comma-dangle': [
      'error',
      {
        arrays: 'always-multiline',
        objects: 'always-multiline',
        imports: 'always-multiline',
        exports: 'always-multiline',
        functions: 'ignore',
      },
    ],
    'object-curly-spacing': ['error', 'always'],
  },
};
;