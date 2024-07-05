export const $win = $(window);
export const $doc = $(document);
export const $body = $('body');
export const $header = $('.header');
export const getHeaderHeight = () => $header.length ? $header.innerHeight() : 0;
export const getAdminBarHeight = () => $('#wpadminbar').length ? $('#wpadminbar').innerHeight() : 0;
export const hasFixedHeader = true;
