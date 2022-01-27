let pond;
let filepondInit = function wizardInit() {
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageResize,
        FilePondPluginFileValidateType,
        FilePondPluginFileRename,
    );

    const inputElement = document.getElementById('image');
    pond = FilePond.create(inputElement, {
        labelIdle: `Drag & Drop or <span class="filepond--label-action"> Browse </span> your product image`,
        acceptedFileTypes: ['image/jpg', 'image/png', 'image/jpeg'],
        dropOnPage: true,
        allowDrop: true,
        storeAsFile: true,
        instantUpload: false,

        imageCropAspectRatio: '1:1',
        imageResizeMode: 'cover',
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,

        stylePanelLayout: 'compact circle',
        styleLoadIndicatorPosition: 'center bottom',
        styleProgressIndicatorPosition: 'right bottom',
        styleButtonRemoveItemPosition: 'left bottom',
        styleButtonProcessItemPosition: 'right bottom',
    });
};