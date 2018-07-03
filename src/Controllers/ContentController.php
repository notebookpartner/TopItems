<?php

namespace TopItems\Controllers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;
use Plenty\Modules\Item\Variation\Contracts\VariationSearchRepositoryContract ;

class ContentController extends Controller
{
    public function showTopItems(Twig $twig, VariationSearchRepositoryContract $itemRepository):string
    {
        $itemColumns = [
            'itemDescription' => [
                'name2',
                'description'
            ],
            'variationBase' => [
                'id',
		'availability',
		'variationName',
		'active'
            ],
            'variationRetailPrice' => [
                'price'
            ],
            'variationImageList' => [
                'path',
                'cleanImageName'
            ]
        ];

        $itemFilter = [
            'itemBase.isStoreSpecial' => [
                'shopAction' => [3]
            ]
        ];

        $itemParams = [
            'language' => 'de'
        ];
	$itemRepository->setFilters($itemFilter);
	$itemRepository->setSearchParams($itemParams);
        $resultItems = $itemRepository->search();

        $items = array();
        foreach ($resultItems as $item)
        {
            $items[] = $item;
        }
        $templateData = array(
            'resultCount' => $resultItems->count(),
            'currentItems' => $items
        );

        return $twig->render('TopItems::content.TopItems', $templateData);
    }
}
