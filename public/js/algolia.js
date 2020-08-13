(function() {
    const client = algoliasearch(
        "ESPV82FGSO",
        "8be5969441cc59ca8a5c435dac3cfadc"
    );
    const products = client.initIndex("products");
    var enterPressed = false;

    autocomplete("#aa-search-input", {}, [
        {
            source: autocomplete.sources.hits(products, {
                hitsPerPage: 50
            }),
            displayKey: "name",
            templates: {
                suggestion({ _highlightResult }) {
                    const markup = `
                        <div class="algolia-result">
                            <span>
                                ${_highlightResult.name.value} 
                            </span>
                            <span>
                                &#8377;${_highlightResult.price.value}
                            </span>
                        </div>
                        <div class="algolia-details">
                            <span>${_highlightResult.details.value}</span>
                        </div>
                    `;

                    return markup;
                },
                empty: function(result) {
                    return (
                        'Sorry, we did not find any  result for "' +
                        result.query +
                        '"'
                    );
                }
            }
        }
    ])
        .on("autocomplete:selected", function(event, suggestion, dataset) {
            window.location.href =
                window.location.origin + "/shop/" + suggestion.slug;
            enterPressed = true;
        })
        .on("keyup", function(event) {
            if (event.keyCode == 13 && !enterPressed) {
                window.location.href =
                    window.location.origin +
                    "/search-algolia?products[query]=" +
                    document.getElementById("aa-search-input").value;
            }
        });
})();
