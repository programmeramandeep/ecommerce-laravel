(function() {
    const searchClient = algoliasearch(
        "ESPV82FGSO",
        "8be5969441cc59ca8a5c435dac3cfadc"
    );

    const search = instantsearch({
        indexName: "products",
        searchClient,
        routing: true
    });

    search.addWidgets([
        instantsearch.widgets.searchBox({
            container: "#searchbox",
            placeholder: "Search for products",
            autofocus: true
        }),

        // <img src="${window.location.origin}/storage/${ hit.image }" alt="img" class="algolia-thumb-result img-thumbnail border-0" />

        instantsearch.widgets.hits({
            container: "#hits",
            templates: {
                empty: "No results for <q>{{ query }}</q>",
                item(hit) {
                    return `
          <article>
          <img src="https://via.placeholder.com/150" alt="img" class="algolia-thumb-result img-thumbnail border-0" />
            <a href="${window.location.origin}/shop/${hit.slug}">
            <strong>${instantsearch.highlight({
                attribute: "name",
                highlightedTagName: "mark",
                hit
            })}</strong>
            </a>
            <p>${instantsearch.highlight({
                attribute: "details",
                highlightedTagName: "mark",
                hit
            })}</p>
            <p>Price: &#8377;${instantsearch.highlight({
                attribute: "price",
                highlightedTagName: "mark",
                hit
            })}</p>
            
          </article>
        `;
                }
            }
        }),

        instantsearch.widgets.pagination({
            container: "#pagination",
            scrollTo: false,
            totalPages: 10
        }),

        instantsearch.widgets.stats({
            container: "#stats"
        }),

        instantsearch.widgets.refinementList({
            container: "#refinement-list",
            attribute: "categories"
        }),

        instantsearch.widgets.clearRefinements({
            container: "#clear-refinements"
        })
    ]);

    search.start();
})();
