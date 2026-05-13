(async function() {
    // Находим ссылки вокруг картинок NextGEN
    const links = document.querySelectorAll('.ngg-gallery-thumbnail-box a');
    const urls = Array.from(links).map(a => a.href).filter(href => href && href.match(/\.(jpg|jpeg|png|webp|gif)/i));

    if (urls.length === 0) {
        console.error('Оригинальные ссылки на картинки не найдены. Попробуйте Вариант 1.');
        return;
    }

    console.log(`Найдено оригиналов для скачивания: ${urls.length}`);
    const sleep = ms => new Promise(resolve => setTimeout(resolve, ms));

    for (let i = 0; i < urls.length; i++) {
        try {
            const response = await fetch(urls[i]);
            const blob = await response.blob();
            const blobUrl = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = blobUrl;
            link.download = urls[i].substring(urls[i].lastIndexOf('/') + 1).split('?')[0];
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(blobUrl);
            await sleep(500);
        } catch (e) {
            console.error('Ошибка:', urls[i], e);
        }
    }
})();
