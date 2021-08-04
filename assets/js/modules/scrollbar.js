/**
 * Adds a CSS var for the scrollbar width
 */

export default () => {
  const getScrollbarWidth = () => {
    const scrollBarWidth = window.innerWidth - document.documentElement.clientWidth;
    document.documentElement.style.setProperty(
      '--scrollbar-width',
      `${scrollBarWidth}px`,
    );
  };
  getScrollbarWidth();
  window.addEventListener('resize', getScrollbarWidth);
};
