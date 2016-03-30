<?php
namespace Ficus;

class Search extends Base\Search {
	
	/**
	 * Searches for multiple items and returns them
	 * @see \Mojavi\Form\OrmForm::queryAll()
	 */
	function queryAll() {
		$results = array();
		
		/* @var $offer \Flux\Offer */
		$offer = new \Flux\Offer();
		$offer->setKeywords($this->getKeywords());
		$offers = $offer->queryAll();
		foreach ($offers as $offer) {
			/* @var $search \Flux\Search */
			$search = new \Flux\Search();
			$search->setName($offer->getName());
			$search->setDescription($offer->getClient()->getName());
			$search->setUrl('/offer/offer?_id=' . $offer->getId());
			$search->setSearchType(\Flux\Search::SEARCH_TYPE_OFFER);
			$results[] = $search;
		}
		
		/* @var $campaign \Flux\Campaign */
		$campaign = new \Flux\Campaign();
		$campaign->setKeywords($this->getKeywords());
		$campaigns = $campaign->queryAll();
		foreach ($campaigns as $campaign) {
			/* @var $search \Flux\Search */
			$search = new \Flux\Search();
			$search->setName($campaign->getKey());
			$search->setDescription($campaign->getDescription());
			$search->setUrl('/campaign/campaign?_id=' . $campaign->getId());
			$search->setSearchType(\Flux\Search::SEARCH_TYPE_CAMPAIGN);
			$results[] = $search;
		}
		
		/* @var $fulfillment \Flux\Fulfillment */
		$fulfillment = new \Flux\Fulfillment();
		$fulfillment->setKeywords($this->getKeywords());
		$fulfillments = $fulfillment->queryAll();
		foreach ($fulfillments as $fulfillment) {
			/* @var $search \Flux\Search */
			$search = new \Flux\Search();
			$search->setName($fulfillment->getName());
			$search->setDescription($fulfillment->getDescription());
			$search->setUrl('/admin/fulfillment?_id=' . $fulfillment->getId());
			$search->setSearchType(\Flux\Search::SEARCH_TYPE_FULFILLMENT);
			$results[] = $search;
		}
	
		/* @var $lead \Flux\Lead */
		$lead = new \Flux\LeadSearch();
		$lead->setKeywords($this->getKeywords());
		$leads = $lead->queryAll();
		foreach ($leads as $lead) {
			/* @var $search \Flux\Search */
			$search = new \Flux\Search();
			$search->setName($lead->getId());
			$name = $lead->getValue('fn') . ' ' . $lead->getValue('ln');
			if (trim($name) == '') {
				$name = $lead->getValue('name');
			}
			
			$search->setDescription($name . ' / ' . $lead->getValue('em'));
			$search->setMeta('Created ' . date('m/d/Y g:i a', $lead->getId()->getTimestamp()));
			$search->setUrl('/lead/lead?_id=' . $lead->getId());
			$search->setSearchType(\Flux\Search::SEARCH_TYPE_LEAD);
			$results[] = $search;
		}
		
		/* @var $lead_split \Flux\LeadSplit */
		if (\MongoId::isValid($this->getKeywords())) {
			$lead_split = new \Flux\LeadSplit();
			$lead_split->setId(new \MongoId($this->getKeywords()));
			$lead_split->query();
			if (\MongoId::isValid($lead_split->getId()) && \MongoId::isValid($lead_split->getLead()->getId())) {
				/* @var $search \Flux\Search */
				$search = new \Flux\Search();
				$search->setName($lead_split->getId());
				$search->setDescription($lead_split->getLead()->getLeadName() . ' / ' . $lead_split->getLead()->getEmail());
				$search->setMeta('Fulfilled to ' . $lead_split->getSplit()->getName());
				$search->setUrl('/lead/lead?_id=' . $lead_split->getLead()->getLeadId() . '&tab=attempts');
				$search->setSearchType(\Flux\Search::SEARCH_TYPE_LEAD_SPLIT);
				$results[] = $search;
			}
		}
	
		return $results;
	}
	
}