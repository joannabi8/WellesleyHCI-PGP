<?php
	session_start();
	$_SESSION["vis"] = "v2";
	error_reporting(E_ERROR);
?>
<!--
	v2.php
	2/21/14
	Third visualization test for personal genomic project user test
	Nicole Francisco, Kara Lu
	for Wellesley College HCI Lab

	Updated by Claire Schlenker 
	6 June 2014
-->
<!DOCTYPE>
<html>
	<head>
		<title>PGP Visualization: Bar Chart</title>
		<!--Google TreeMap API-->
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>

		<!--jQuery & vis.js-->
		<script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-1.10.2.js"></script>
		<script type="text/javascript" charset="utf8" src="scripts/vis.js"></script>

		<!-- jQuery UI -->
		<link rel="stylesheet" type="text/css" href="scripts/jquery/jquery-ui-1.10.4.custom.css" rel="stylesheet">
		<script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-ui-1.10.4.custom.js"></script>

		<link href="styles/bootswatch.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/style.css">

		<script>
			$(function(){
				// Validate form
				var submit_id = $("#Submit_v2");
				var form_id = $("#v2_q");
				var validateWarning = $("#validate_msg");
				
				validateForm_vis(submit_id,form_id,validateWarning);

				// Load Google BarChart
				google.load('visualization', '1', {
					"packages": ['corechart'],
					"callback": treeMapLoaded
				});

			});
			
		</script>

		<script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		     
		                                 
		        ['Variant',      'Impact Quant',      {role: 'style' },      {role: 'tooltip'}],
		     
		  //High Clinical Importance:

		        ['SERPINA1-E366K',      9,                  '#ff3333',       'Variant Name: SERPINA1-E366K' + '\n' +
		                                                                     'Clinical Importance: High' + '\n' + 
		                                                                     'Impact: Well-Established Pathogenic' + '\n' +  
		                                                                     'Status: Recessive Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 1.2%' + '\n' + 
		                                                                     'Summary: This is also called the "Pi Z" or "Z" allele. When homozygous' + '\n' + 
		                                                                     '(acting in a recessive manner) this variant is the major cause of severe' + '\n' +
		                                                                     'alpha-1-antitrypsin deficiency (95% of cases) which often leads to emphysema' + '\n' +
		                                                                     'or chronic obstructive pulmonary disease (COPD) and liver disease in adults' + '\n' +
		                                                                     'and children. Heterozygosity for this variant may also be associated with' + '\n' +
		                                                                     'increased rate of lung or liver problems, especially when combined with' + '\n' +
		                                                                     'another variant with reduced function (compound heterozygous).'],
		       
		       ['BBS7-D412G',          7,                  '#cc6666',        'Variant Name: BBS7-D412G' + '\n' +
		                                                                     'Clinical Importance: High' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Recessive Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 0.2%' + '\n' + 
		                                                                     'Summary: Predicted to have damaging effect, other mutations in this gene' + '\n' +
		                                                                     'have been implicated in causing Bardet-Biedl syndrome in a recessive manner.'],

		        ['RYR2-G1885E',         7,                  '#cc6666',           'Variant Name: RYR2-G1885E' + '\n' +
		                                                                     'Clinical Importance: High' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Recessive Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 1.8%' + '\n' + 
		                                                                     'Summary: Reported to cause arrhythmogenic right ventricular cardiomyopathy' + '\n' +
		                                                                     'when compound heterozygous with G1886S, although this finding is weakened' + '\n' +
		                                                                     'after correcting for multiple hypotheses and it is unclear what penetrance' + '\n' +
		                                                                     'such a genotype might have, if it is causal.'],

		        
		  
		  //Medium Clinical Importance: 
		        ['',                    0,                  'Yellow',        ' ' ],
		        ['C3-R102G',            8,                  '#e34b4b',        'Variant Name: C3-R102G' + '\n' +
		                                                                     'Clinical Importance: Medium' + '\n' + 
		                                                                     'Impact: Likely Pathogenic' + '\n' +  
		                                                                     'Status: Complex/Other (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 15%' + '\n' + 
		                                                                     'Summary: This variant (also called C3F) is common in Europeans' + '\n' +
		                                                                     '(10.2% allele frequency), and is associated with age-related' + '\n' +
		                                                                     'macular degeneration. In the US, 1.5% of adults over 40 have' + '\n' +
		                                                                     'the disease, but the incidence increases strongly with age' +'\n' +
		                                                                     '(>15% in women over 80). Assuming an average lifetime risk'+ '\n' +
		                                                                     'of ~10%, heterozygous individuals have a ~13% risk and' +'\n' +
		                                                                     'homozygous have ~20%.'],
		         
		        ['MYO1A-S797F',         7,                  '#cc6666',        'Variant Name: MYO1A-S797F' + '\n' +
		                                                                     'Clinical Importance: Medium' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Dominant (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 0.47%' + '\n' + 
		                                                                     'Summary: Although reported to cause dominant, early-onset' + '\n' +
		                                                                     'sensorineural hearing loss, this variant has been reported' + '\n' +
		                                                                     'in the genome of an unaffected PGP participant.'],
		  
		        ['WFS1-C426Y',          7,                  '#cc6666',        'Variant Name: WFS1-C426Y' + '\n' +
		                                                                     'Clinical Importance: Medium' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Dominant (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 0.12%' + '\n' + 
		                                                                     'Summary: Reported in a single case of familial depression,' +'\n' +
		                                                                     'but no linkage data and no statistical significance.'],
		  
		              
		        ['SIAE-M89V',           7,                  '#cc6666',        'Variant Name: SIAE-M89V' + '\n' +
		                                                                     'Clinical Importance: Medium' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 4%' + '\n' + 
		                                                                     'Summary: This variant wa4s reported to be associated with autoimmune' + '\n' +
		                                                                     'disease when homozygous. However, a later publication has contradicted' + '\n' +
		                                                                     'this result, finding no significant association between this variant and' + '\n' +
		                                                                     'autoimmune disease in a very large cohort.'],
		         
		        ['FIG4-K278',           7,                  '#cc6666',        'Variant Name: SIAE-M89V' + '\n' +
		                                                                     'Clinical Importance: Medium' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 0.78%' + '\n' + 
		                                                                     'Summary: This variant is predicted to cause a frameshift and may cause' + '\n' +
		                                                                     'Charcot-Marie-Tooth Disease Type 4J in an autosomal recessive manner.' + '\n' +
		                                                                     'Other variants in this gene which cause frameshift and premature' + '\n' +
		                                                                     'termination have been implicated in causing this disease when compound' + '\n' +
		                                                                     'heterozygous with another FIG4 variant.'],
		         
		        ['CYP2C9-R144C',        7,                  '#cc6666',        'Variant Name: CYP2C9-R144C' + '\n' +
		                                                                     'Clinical Importance: Medium' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Unknown, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 9.70%' + '\n' + 
		                                                                     'Summary: This variant, also called CYP2C9*2, is a pharmacogenetic variant' + '\n' +
		                                                                     'that modulates sensitivity for Warfarin (due to reduced metabolism).' + '\n' +
		                                                                     'This variant is associated with Caucasians. The FDA has approved reduced' + '\n' +
		                                                                     'recommended Warfarin dosage based on the presence of this variant.'],
		 
		  ['FUT2-W154X',          1,                  '#329632',        'Variant Name: FUT2-W154X' + '\n' +
		                                                                     'Clinical Importance: Medium' + '\n' + 
		                                                                     'Impact: Well-Established Protective' + '\n' +  
		                                                                     'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 49%' + '\n' + 
		                                                                     'Summary: This recessive protective variant confers resistance to \n' + 
		                                                                     'norovirus (which causes stomach flu). 20% of Caucasians and \n' +
		                                                                     'Africans are homozygous for this variant and are non-secretors: \n' + 
		                                                                     'They do not express ABO blood type antigens in their saliva or \n' +
		                                                                     'mucosal surfaces. Most strains of norovirus bind to these antigens in \n' +
		                                                                     'the gut, and so this non-secretor status confers almost total resistantance \n' +
		                                                                     'to most types of norovirus. There are notable exceptions, some strains of \n' +
		                                                                     'norovirus bind a different target and are equally infectious for \n' + 
		                                                                     'secretors and non-secretors. '], 
		     
		  //Low Clinical Importance: 
		        ['',                    0,                  'Red',              ' ' ],
		        ['SERPINA1-E288V',      9,                  '#ff3333',       'Variant Name: SERPINA1-E288V' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Well-Established Pathogenic' + '\n' +  
		                                                                     'Status: Recessive Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 3%' + '\n' + 
		                                                                     'Summary: This variant represents the PiS variant in alpha-1-antitrypsin' + '\n' +
		                                                                     'deficiency where a homozygous individual has 60% enzymatic activity. This' + '\n' + 
		                                                                     'variant alone is unlikely to much effect, but 3-4% of heterozygotes are' + '\n' +
		                                                                     'compound heterozygous with the more severe PiZ variant, which is associated' + '\n' +
		                                                                     'with an increased risk of emphysema and COPD.'],

		        ['MTRR-I49M',           8,                  '#e34b4b',         'Variant Name: MTRR-I49M' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Likely Pathogenic' + '\n' +  
		                                                                     'Status: Recessive Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 45%' + '\n' + 
		                                                                     'Summary: This common variant (HapMap allele frequency of 31.3%) in a protein' + '\n' +
		                                                                     'involved in folate (B9) and cobalamin (B12) metabolism and is often reported' + '\n' +
		                                                                     'as "MTRR I22M" (an alternative transcript position). Mothers homozygous for' + '\n' +
		                                                                     'this variant are associated with having around a increased chance of a child' + '\n' +
		                                                                     'with Down syndrome (risk of 0.4%, average risk in population is 0.25%). Notably,' + '\n' +
		                                                                     'age plays a far larger role in the rate of Down syndrome (risk is 4.5% for a' + '\n' +
		                                                                     'mother 45-years-of-age), and it is unknown how this variant may combine with the' + '\n' +
		                                                                     'effect of age. There are conflicting reports associating this variant with incidence' + '\n' +
		                                                                     'of neural tube defects, possibly when combined with MTHFR A222V.'],

		        ['RNASEL-R462Q',        7,                  '#cc6666',         'Variant Name: RNASEL-R462Q' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Complex/Other, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 28%' + '\n' + 
		                                                                     'Summary: Associated with increased risk of prostate cancer in individuals who' + '\n' +
		                                                                     'already have a family history of prostate cancer, but studies have been unable' + '\n' +
		                                                                     'to replicate this finding in sporadic (non-familial) prostate cancer cases.'],

		        ['TGIF1-P83Shift',      7,                  '#cc6666',         'Variant Name: TGIF1-P83Shift' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Complex/Other, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 14%' + '\n' + 
		                                                                     'Summary: Severe variants in this gene are associated with holoprosencephaly' + '\n' +
		                                                                     'disorders when combined with loss-of-function variants in SHH.' + '\n' + 
		                                                                     'Haploinsufficiency was identified in some families with this condition.' + '\n' +
		                                                                     'It is unclear how likely this variant is to occur in combination with an' + '\n' +
		                                                                     'SHH variant, or what phenotypic effect the variant would have on its own.'],
		         
		        ['TLR5-R392X',          7,                  '#cc6666',         'Variant Name: TLR5-R392X' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Complex/Other, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 4%' + '\n' + 
		                                                                     'Summary: This variant is believed to impair the ability to generate an' + '\n' +
		                                                                     'immune response to the flagella of the bacteria. It is weakly associated' + '\n' +
		                                                                     'with an increased incidence of Legionnaires\' Disease, p = 0.085, increased' + '\n' +
		                                                                     'lifetime risk of disease ~0.88% (about twice average). The variant is also' + '\n' +
		                                                                     'weakly associated with a reduced incidence of systemic lupus' + '\n' +
		                                                                     'erythematosus, p = 0.165. '],
		  
		  
		        ['SP110-L425S',         7,                  '#cc6666',         'Variant Name: SP110-L425s' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Complex/Other, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 86%' + '\n' + 
		                                                                     'Summary: This variant is associated with a slightly increased risk of' + '\n' +
		                                                                     'tuberculosis. It is unclear whether it is itself causal, or in linkage' + '\n' +
		                                                                     'disequilibrium with some other causal variant that has a stronger effect.'],
		  
		        ['WFS1-R611H',          7,                  '#cc6666',         'Variant Name: WFS1-R611H' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 40%' + '\n' + 
		                                                                     'Summary: This nonsynonymous SNP is associated with Wolfram Syndrome' + '\n' +
		                                                                     '(known as DIDMOAD), which is characterized by early-onset non-autoimmune' + '\n' +
		                                                                     'diabetes mellitus, diabetes insipidus, optic atrophy, and deafness) and to' + '\n' +
		                                                                     'adult Type Two Diabetes Mellitus. The WFS1 gene maps to chromosome 4p16.3.' + '\n' +
		                                                                     'The variant has been shown to be statistically associated with type II' + '\n' +
		                                                                     'diabetes in six UK studies and one study of Ashkenazi Jews' + '\n' +
		                                                                     '(Sandhu, M., et al., Minton et al.).'],
		         
		        ['HFE-H63D',            7,                  '#cc6666',         'Variant Name: HFE-H63D' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 11%' + '\n' + 
		                                                                     'Summary: There have been some hypotheses that this variant contributes' + '\n' +
		                                                                     'to causing hereditary hemachromatosis, possibly as a compound heterozygote,' + '\n' +
		                                                                     'but some others treat it as a polymorphism. Cys282Tyr is the classic causal' + '\n' + 
		                                                                     'variant and itself has very low penetrance. Mouse studies indicates this variant' + '\n' + 
		                                                                     'has a similar but weaker effect; if it has any effect at all its penetrance may' + '\n' + 
		                                                                     'be quite low and/or require modifier alleles.'],
		  
		        ['ACAD8-S171C',         7,                  '#cc6666',         'Variant Name: ACAD8-S171C' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                     'Allele Frequency: 1.80%' + '\n' + 
		                                                                     'Summary: This variant (a.k.a S149C) was found as a compound heterozygote' + '\n' +
		                                                                     '(with M130T) in a male newborn of European descent with isobutyryl-CoA' + '\n' +
		                                                                     'dehydrogenase deficiency (identified by newborn screening). Lack of controls' + '\n' +
		                                                                     'means that significance cannot be established and allele frequency cannot be' + '\n' + 
		                                                                     'estimated. Oglesbee et al. comment that IBD-deficiency may be relatively benign,' + '\n' +
		                                                                     'most cases identified by newborn screening have remained asymptomatic,' + '\n' + 
		                                                                     'but Ferreira et al. report a symptomatic individual homozygous for this variant.'],
		  
		        ['rs1544410',           7,                  '#cc6666',         'Variant Name: ACAD8-S171C' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Pathogenic' + '\n' +  
		                                                                     'Status: Unknown, Homozygous' + '\n' + 
		                                                                     'Allele Frequency: 35%' + '\n' + 
		                                                                     'Summary: rs1544410 is a Vitamin D Receptor (VDR) single nucleotide' + '\n' +
		                                                                     'polymorphism. It is unlikely that it has functional significance because' + '\n' + 
		                                                                     'it is located in an intron (Liu et. al.), but it is in strong linkage' + '\n' +
		                                                                     'disequilibrium with rs731236 (Dvornyk et al), which is located in an exon.'],
		  
		            ['COL5A2-P460S',        6,                  '#b07d7d',         'Variant Name: COL5A2-P460S' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Uncertain Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 4%' + '\n' + 
		                                                                         'Summary: Tentatively benign. Although predicted to be damaging by' + '\n' +
		                                                                         'Polyphen 2, this variant is seen in 2 out of 62 PGP & public' + '\n' +
		                                                                         'genomes. OMIM lists other more disruptive variants (frameshift &' + '\n' +
		                                                                         'nonsense) as reported to cause Ehlers-Danlos syndrome when homozygous.'],
		      
		            ['CASP8-M1T',           6,                  '#b07d7d',         'Variant Name: CASP8-M1T' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Uncertain Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 3.1%' + '\n' + 
		                                                                         'Summary: Probably benign. Although start codons can be extremely' + '\n' +
		                                                                         'disruptive and this gene is implicated in a rare disease (autoimmune' + '\n' +
		                                                                         'lymphoproliferative syndrome), the allele frequency for this variant' + '\n' +
		                                                                         '(2-3%) is high enough to contradict such a strong pathogenic effect.' + '\n' +
		                                                                         'This may be because the gene has many other transcripts that do not' + '\n' +
		                                                                         'include this position as exonic.'],
		      
		            ['PKP2-L366P',          6,                  '#b07d7d',         'Variant Name: PKP2-L366P' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Uncertain Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 22%' + '\n' + 
		                                                                         'Summary: This variant is a benign polymorphism.'],
		      
		        ['RP1-N985Y',           6,                  '#b07d7d',         'Variant Name: RP1-N985Y' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Homozygous' + '\n' + 
		                                                                     'Allele Frequency: 35%' + '\n' + 
		                                                                     'Summary: Probably benign. One report linked this variant to high' + '\n' +
		                                                                     'triglycerides, but a later paper found a nearby SNP with similar' + '\n' +
		                                                                     'association and suggests that both findings are caused by linkage' + '\n' +
		                                                                     'to an undiscovered causal variant.'],
		     
		        ['DSP-R1537C',          6,                  '#b07d7d',         'Variant Name: DSP-R1537C' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 1%' + '\n' + 
		                                                                     'Summary: Probably benign / nonpathogenic.'],
		      
		        ['ELN-G581R',           6,                  '#b07d7d',         'Variant Name: ELN-G581R' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 7.3%' + '\n' + 
		                                                                     'Summary: Probably a benign SNP, not rare (4.8% allele frequency' + '\n' +
		                                                                     'in GET-Evidence data).'],
		  
		        ['LYST-R159K',          6,                  '#b07d7d',         'Variant Name: LYST-R159K' + '\n' +
		                                                                    'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 0.78%' + '\n' + 
		                                                                     'Summary: Rare and unreported, tentatively evaluated as benign.' + '\n' +
		                                                                     'Some severe mutations in this gene cause Chediak-Higashi syndrome' + '\n' +
		                                                                     '(a severe genetic disorder causing albinism, neuropathy, and life-' + '\n' +
		                                                                     'threatening susceptibility to bacterial infections), but this' + '\n' + 
		                                                                     'disease is rare and there are many other genomes with rare missense' + '\n' +
		                                                                     'polymorphisms.'],
		  
		        ['MAPT-R370W',          6,                  '#b07d7d',         'Variant Name: MAPT-R370W' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Homozygous' + '\n' + 
		                                                                     'Allele Frequency: 16%' + '\n' + 
		                                                                     'Summary: Probably Benign'],
		  
		        ['TCIRG1-R56W',         6,                  '#b07d7d',         'Variant Name: TCIRG1-R56W' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 4.4%' + '\n' + 
		                                                                     'Summary: Probably benign. One publication implicates the variant' + '\n' +
		                                                                     'in causing osteopetrosis, but this is contradicted by the relatively' + '\n' +
		                                                                     'high allele frequency for the variant in Caucasians (5%, 1 in 400' + '\n' +
		                                                                     'homozygous) while that disease is extremely rare (1 in 250,000).'],
		  
		        ['PTCH1-P1315L',        6,                  '#b07d7d',         'Variant Name: PTCH1-P1315L' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 30%' + '\n' + 
		                                                                     'Summary: Common polymorphism, presumed benign.'],
		  
		        ['TXNDC3-I338T',        6,                  '#b07d7d',         'Variant Name: TXNDC3-I338T' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Homozygous' + '\n' + 
		                                                                     'Allele Frequency: 3.8%' + '\n' + 
		                                                                     'Summary: Tentatively classified as benign, but predicted to be' + '\n' +
		                                                                     'damaging and other variants in this gene are implicated in' + '\n' +
		                                                                     'causing primary ciliary dyskinesia (situs inversus, chronic' + '\n' +
		                                                                     'sinusitis, and bronchiectasis).'],
		  
		        ['MUSK-T100M',          6,                  '#b07d7d',         'Variant Name: MUSK-T100M' + '\n' +
		                                                                     'Clinical Importance: Low' + '\n' + 
		                                                                     'Impact: Uncertain Benign' + '\n' +  
		                                                                     'Status: Unknown, Heterozygous' + '\n' + 
		                                                                     'Allele Frequency: 2.3%' + '\n' + 
		                                                                     'Summary: Likely Benign'], 
		     ['LIG4-A3V',            5,                  '#bdbdbd',         'Variant Name: LIG4-A3V' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Uncertain Protective' + '\n' +  
		                                                                         'Status: Dominant, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 3.6%' + '\n' + 
		                                                                         'Summary: One report has associated this with a decreased risk' + '\n' +
		                                                                         'of multiple myeloma.'],
		      
		            ['DTNBP1-P272S',        5,                  '#bdbdbd',       'Variant Name: DTNBP1-P272S' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Uncertain Protective' + '\n' +  
		                                                                         'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                         'Allele Frequency: 3.5%' + '\n' + 
		                                                                         'Summary: Possibly a slight protective effect against colorectal' + '\n' + 
		                                                                         'cancer if homozygous.'],
		          
		            ['NEFL-S472Shift',      4,                  '#7d967d',         'Variant Name: NEFL-S472Shift' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Benign' + '\n' +  
		                                                                         'Status: Unknown, Homozygous' + '\n' + 
		                                                                         'Allele Frequency: ?' + '\n' + 
		                                                                         'Summary: Although a frameshift in this gene would be predicted to' + '\n' +
		                                                                         'cause Charcot-Marie Neuropathy, this particular position appears' + '\n' +
		                                                                         'to reflect a single base insertion error/mutation in the reference' + '\n' +
		                                                                         'genome (in other words, normal individuals are always homozygous' + '\n' +
		                                                                         'for a deletion at this position relative to reference). See' + '\n' + 
		                                                                         'chr8:24,811,060-24,811,080 annotations on UCSC.'],
		      
		            ['MSH2-G322D',          4,                  '#7d967d',         'Variant Name: MSH2-G322D' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 1.1%' + '\n' + 
		                                                                         'Summary: Although other variants in this mismatch repair gene are' + '\n' +
		                                                                         'associated with cancer, most publications dismiss this variant as' + '\n' +
		                                                                         'a polymorphism (HapMap allele frequency of 1.6%).'],
		      
		            ['CACNA1S-L458H',       4,                  '#7d967d',         'Variant Name: CACNA1S-L458H' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 27%' + '\n' + 
		                                                                         'Summary: Common polymorphism.'],
		      
		            ['ADA-K80R',            4,                  '#7d967d',         'Variant Name: ADA-K80R' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Benign' + '\n' +  
		                                                                         'Status: Recessive, Carrier (Heterozygous)' + '\n' + 
		                                                                         'Allele Frequency: 6.4%' + '\n' + 
		                                                                         'Summary: This variant has a 3.5% allele frequency in 1000 genomes' + '\n' +
		                                                                         'data. Although OMIM links this to disease, the paper they reference' + '\n' +
		                                                                         'uses in vitro data to conclude that this is a functionally neutral' + '\n' +
		                                                                         'polymorphism.'],
		      
		            ['COL9A2-T246M',        4,                  '#7d967d',         'Variant Name: COL9A2-T246M' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 2.5%' + '\n' + 
		                                                                         'Summary: Likely benign.'],
		      
		            ['FANCI-P55L',          4,                  '#7d967d',         'Variant Name: FANCI-P55L' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 5.1%' + '\n' + 
		                                                                         'Summary: Probably benign.'],
		      
		            ['PKD1-A4059V',         4,                  '#7d967d',         'Variant Name: PKD1-A4059V' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 5.7%' + '\n' + 
		                                                                         'Summary: Probably benign.'],
		        
		           ['ARSA-N350S',          3,                  '#659665',         'Variant Name: ARSA-N350S' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Well-established Benign' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 18' + '\n' + 
		                                                                         'Summary: This common variant (HapMap 24.1% allele frequency) causes' + '\n' +
		                                                                         'a loss of a glycosylation site (affecting the size of the protein' + '\n' +
		                                                                         'when studied with gel electrophoresis) but does not affect enzyme' + '\n' + 
		                                                                         'activity or stability.'],
		      
		      

		  
		          ['IL7R-T244I',          2,                  '#4d994d',         'Variant Name: IL7R-T244I' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Protective' + '\n' +  
		                                                                         'Status: Unknown, Heterozygous' + '\n' + 
		                                                                         'Allele Frequency: 21%' + '\n' + 
		                                                                         'Summary: The reference genome variant for this allele has been' + '\n' +
		                                                                         'associated with a slight increased risk of multiple sclerosis.' + '\n' +
		                                                                         'Thus, this variant can be treated as a "protective" variant --' + '\n' +
		                                                                         'carriers of this variant are slightly less likely to have MS.' + '\n' +
		                                                                         'Because the disease is rare and the effect of this variant is' + '\n' +
		                                                                         'not very strong, the absolute decreased risk for carriers of' + '\n' +
		                                                                         'this variant is less than .05% (less than 1 in 2000).'],
		      
		            ['KCNJ11-K23E',         2,                  '#4d994d',         'Variant Name: KCNJ11-K23E' + '\n' +
		                                                                         'Clinical Importance: Low' + '\n' + 
		                                                                         'Impact: Likely Protective' + '\n' +  
		                                                                         'Status: Unknown, Homozygous' + '\n' + 
		                                                                         'Allele Frequency: 74%' + '\n' + 
		                                                                         'Summary: This variant is associated with decreased risk of type' + '\n' +
		                                                                         '2 diabetes. It is unclear whether this variant has additive' + '\n' +
		                                                                         'effects, or acts in a dominant or recessive manner. Assuming' + '\n' +
		                                                                         'diabetes has a lifetime risk of 36%, we estimate a decreased' + '\n' +
		                                                                         'risk of around 1-2% per copy of this variant.']
		        
		      ]);
		        
		// Create and draw the visualization.
		new google.visualization.ColumnChart(document.getElementById('visualization')).
		    draw(data,
		         {title:"Personal Genome Project",
		          width:1250, height:400,
		          
		          //ToolTip Stuff
		          tooltip:{isHTML: 'true'}, 
		          legend: {position: 'none'}, 
		          
		          vAxis: {
		           title: "Impact Quant",
		           textStyle:{fontSize:8}, 
		           titleTextStyle:{fontSize: 7.5}, 
		           ticks: [{v:0, f:" "}, {v:1, f:"Well-Established Protective"},{v:2, f:"Likely Protective"}, {v:3, f:"Well-Established Benign"},
		                   {v:4, f:"Likely Benign"},{v:5, f:"Uncertain Protective"},{v:6, f:"Uncertain Benign"},{v:7, f:"Uncertain Pathogenic"}, {v:8, f:"Likely Pathogenic"},
		                   {v:9, f:"Well-Established Pathogenic"}],
		          },
		         
		          hAxis: {
		           title: "Variants", 
		           titleTextStyle:{fontSize:8}, 
		           textStyle:{fontSize:7.5}
		          }} 
		    );
		}
      
      google.setOnLoadCallback(drawVisualization);
    </script>
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<span class="brand"><img src="assets/img/dna.png"> Your Personal Genomics Report</span>
				</div>
			</div>
		</div>
		
		<div class="container" id="study_wrapper">
			<h2>Instructions for the Study</h2>
			<p>Following is a report that is based on an individual's personal genomic information. 
					For the purpose of this study we will name this individual Jamie. Read the explanation 
					below carefully and then study Jamie's report. You will be asked questions about this report. 
					The report was created by comparing Jamie's genome and a database of gene variants that are known
					to be associated with medical conditions. Only gene variants that are found to be medically relevant
					are reported.The report displays a table of gene variants. For each gene variant the chart presents
					its name, clinical importance, impact, allele frequency, and a summary about the medical conditions
					it is associated with. You can sort the table by clicking on the arrows in each of the table columns.
					Also, when hovering upon a column name, additional information about this information category is presented.<p>
			
			<h2>Your Results</h2>
			<div id="visualization" style="margin-left:-80px;"></div>
			<h2>Questions About the Report</h2>
				<p>Please answer the following questions based on Jamie's report. Feel free to <strong>revisit the report</strong> as needed in order to answer the questions correctly.</p>
				<form action="vis_process.php" method="post" id="v2_q">
					
					
					
					<label for="v2_q1"><strong>The number of variants with high clinical importance:</strong></label></p><p>
					<input type="text" name="v2_q1" id="v2_q1"></p><p>
					
					<label for="v2_q2"><strong>The number of variants that are well-established pathogenic:</strong></label></p><p>
					<input type="text" name="v2_q2" id="v2_q2"></p>

					<label for="v2_q3"><strong>Based on the information above, is the number of variants in Jamie's report with low clinical importance greater than, equal to, or less than the number of variants with high clinical importance?</strong></label><p>
					<label class="radio" for="v2_q3_A">
						<input type="radio" name="v2_q3" id="v2_q3_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v2_q3_B">
						<input type="radio" name="v2_q3" id="v2_q3_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v2_q3_C">
						<input type="radio" name="v2_q3" id="v2_q3_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v2_q3_D">
						<input type="radio" name="v2_q3" id="v2_q3_D" value="dunno">I don't know
					</label></p><p>

			
					<label for="v2_q4"><strong>Based on the information above, is the number of uncertain pathogenic variants in Jamie's report greater than, equal to, or less than the number of well established pathogenic variants?</strong></label><p>
					<label class="radio" for="v2_q4_A">
						<input type="radio" name="v2_q4" id="v2_q4_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v2_q4_B">
						<input type="radio" name="v2_q4" id="v2_q4_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v2_q4_C">
						<input type="radio" name="v2_q4" id="v2_q4_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v2_q4_D">
						<input type="radio" name="v2_q4" id="v2_q4_D" value="dunno">I don't know
					</label></p><p>

					<p><strong>Based on the information above, is the number of potentially pathogenic variants in Jamie's report greater than, equal to, or less than the number of potentially benign or protective variants?</strong></p><p>
					
					<label class="radio" for="v2_q5_A">
						<input type="radio" name="v2_q5" id="v2_q5_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v2_q5_B">
						<input type="radio" name="v2_q5" id="v2_q5_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v2_q5_C">
						<input type="radio" name="v2_q5" id="v2_q5_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v2_q5_D">
						<input type="radio" name="v2_q5" id="v2_q5_D" value="dunno">I don't know
					</label></p><p>


					<p><strong>Which variants would Jaime be most likely to discuss with a healthcare provider?</strong></p><p>
					<textarea name="v2_q6" id="v2_q6" cols="30" rows="5"></textarea>
					</p><p>
					

					<p><strong>Based on the information above, is Jamie's risk of developing stomach flu greater than, equal to, or less than the average person?</strong></p><p>
					<label class="radio" for="v2_q7_A">
						<input type="radio" name="v2_q7" id="v2_q7_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v2_q7_B">
						<input type="radio" name="v2_q7" id="v2_q7_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v2_q7_C">
						<input type="radio" name="v2_q7" id="v2_q7_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v2_q7_D">
						<input type="radio" name="v2_q7" id="v2_q7_D" value="dunno">I don't know
					</label></p><p>

					<p><strong>Based on the information above, is Jamie's risk of developing age-related macular degeneration greater than, equal to, or less than the average person?</strong></p><p>
					<label class="radio" for="v2_q8_A">
						<input type="radio" name="v2_q8" id="v2_q8_A" value="greater">Greater than
					</label></p><p>
					<label class="radio" for="v2_q8_B">
						<input type="radio" name="v2_q8" id="v2_q8_B" value="equal">Equal
					</label></p><p>
					<label class="radio" for="v2_q8_C">
						<input type="radio" name="v2_q8" id="v2_q8_C" value="less">Less than
					</label></p><p>
					<label class="radio" for="v2_q8_D">
						<input type="radio" name="v2_q8" id="v2_q8_D" value="dunno">I don't know
					</label></p><p>

					<p><strong>If you were Jamie, knowing this information, which of the following conditions would you be interested in learning more about? Select all that apply.</strong></p>
					<label class="checkbox" for="v2_q9_A">
						<input type="checkbox" name="v2_q9" id="v2_q9_A" value="alzheimers">Alzheimer's
					</label></p><p>
					<label class="checkbox" for="v2_q9_B">
						<input type="checkbox" name="v2_q9" id="v2_q9_B" value="parkinsons">Parkinson's
					</label></p><p>
					<label class="checkbox" for="v2_q9_C">
						<input type="checkbox" name="v2_q9" id="v2_q9_C" value="liver">Liver Disease
					</label></p><p>
					<label class="checkbox" for="v2_q9_D">
						<input type="checkbox" name="v2_q9" id="v2_q9_D" value="colon">Colon Cancer
					</label></p><p>
					<label class="checkbox" for="v2_q9_E">
						<input type="checkbox" name="v2_q9" id="v2_q9_E" value="diabetes">Diabetes
					</label></p><p>
					<label class="checkbox" for="v2_q9_F">
						<input type="checkbox" name="v2_q9" id="v2_q9_F" value="emphysema">Emphysema
					</label></p><p>
					<label class="checkbox" for="v2_q9_G">
						<input type="checkbox" name="v2_q9" id="v2_q9_G" value="tuberculosis">Tuberculosis
					</label></p><p>
					<label class="checkbox" for="v2_q9_H">
						<input type="checkbox" name="v2_q9" id="v2_q9_H" value="eye">Eye Disease
					</label></p><p>

					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th><strong>Statement</strong></th>
								<th><strong>Strongly disagree</strong></th>
								<th><strong>Disagree</strong></th>
								<th><strong>Somewhat disagree</strong></th>
								<th><strong>Neither agree or disagree</strong></th>
								<th><strong>Somewhat agree</strong></th>
								<th><strong>Agree</strong></th>
								<th><strong>Strongly Agree</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>The information in the report was presented in a very clear and accessible manner.</td>
								<td><input type="radio" name="v2_q10_a" value="1"></td>
								<td><input type="radio" name="v2_q10_a" value="2"></td>
								<td><input type="radio" name="v2_q10_a" value="3"></td>
								<td><input type="radio" name="v2_q10_a" value="4"></td>
								<td><input type="radio" name="v2_q10_a" value="5"></td>
								<td><input type="radio" name="v2_q10_a" value="6"></td>
								<td><input type="radio" name="v2_q10_a" value="7"></td>
							</tr>
							<tr>
								<td>The report is easy to understand.</td>
								<td><input type="radio" name="v2_q10_b" value="1"></td>
								<td><input type="radio" name="v2_q10_b" value="2"></td>
								<td><input type="radio" name="v2_q10_b" value="3"></td>
								<td><input type="radio" name="v2_q10_b" value="4"></td>
								<td><input type="radio" name="v2_q10_b" value="5"></td>
								<td><input type="radio" name="v2_q10_b" value="6"></td>
								<td><input type="radio" name="v2_q10_b" value="7"></td>
							</tr>
							<tr>
								<td>The report is predictive of Jamie's future medical conditions with high certainty.</td>
								<td><input type="radio" name="v2_q10_c" value="1"></td>
								<td><input type="radio" name="v2_q10_c" value="2"></td>
								<td><input type="radio" name="v2_q10_c" value="3"></td>
								<td><input type="radio" name="v2_q10_c" value="4"></td>
								<td><input type="radio" name="v2_q10_c" value="5"></td>
								<td><input type="radio" name="v2_q10_c" value="6"></td>
								<td><input type="radio" name="v2_q10_c" value="7"></td>
							</tr>
							<tr>
								<td>I need the help of a healthcare professional to understand the results in the report.</td>
								<td><input type="radio" name="v2_q10_d" value="1"></td>
								<td><input type="radio" name="v2_q10_d" value="2"></td>
								<td><input type="radio" name="v2_q10_d" value="3"></td>
								<td><input type="radio" name="v2_q10_d" value="4"></td>
								<td><input type="radio" name="v2_q10_d" value="5"></td>
								<td><input type="radio" name="v2_q10_d" value="6"></td>
								<td><input type="radio" name="v2_q10_d" value="7"></td>
							</tr>
							<tr>
								<td>The scientific knowledge used to generate this report is well established.</td>
								<td><input type="radio" name="v2_q10_e" value="1"></td>
								<td><input type="radio" name="v2_q10_e" value="2"></td>
								<td><input type="radio" name="v2_q10_e" value="3"></td>
								<td><input type="radio" name="v2_q10_e" value="4"></td>
								<td><input type="radio" name="v2_q10_e" value="5"></td>
								<td><input type="radio" name="v2_q10_e" value="6"></td>
								<td><input type="radio" name="v2_q10_e" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would show the results in the report to my doctor.</td>
								<td><input type="radio" name="v2_q10_f" value="1"></td>
								<td><input type="radio" name="v2_q10_f" value="2"></td>
								<td><input type="radio" name="v2_q10_f" value="3"></td>
								<td><input type="radio" name="v2_q10_f" value="4"></td>
								<td><input type="radio" name="v2_q10_f" value="5"></td>
								<td><input type="radio" name="v2_q10_f" value="6"></td>
								<td><input type="radio" name="v2_q10_f" value="7"></td>
							</tr>
						
	
							<tr>
								<td>The report gives me a firm grasp of Jamie's health and biology.</td>
								<td><input type="radio" name="v2_q10_g" value="1"></td>
								<td><input type="radio" name="v2_q10_g" value="2"></td>
								<td><input type="radio" name="v2_q10_g" value="3"></td>
								<td><input type="radio" name="v2_q10_g" value="4"></td>
								<td><input type="radio" name="v2_q10_g" value="5"></td>
								<td><input type="radio" name="v2_q10_g" value="6"></td>
								<td><input type="radio" name="v2_q10_g" value="7"></td>
							</tr>
							
						</tbody>
					</table>
					
					<label for="v2_q11">Please use the space below to tell us which features were most helpful for understanding the report.</label></p><p>
					<textarea name="v2_q11" id="v2_q11" cols="30" rows="5"></textarea>
					</p><p>

					<label for="v2_q12">Please use the space below to tell us how we can improve the report to make it easier to understand.</label></p><p>
					<textarea name="v2_q12" id="v2_q12" cols="30" rows="5"></textarea>
					</p><p>
					
					
				<input class="btn btn-primary submit-survey" type="submit" name="Submit" value="Submit" id="Submit_v2">
			</form>
		</div>
		<div class="alert alert-block" id='validate_msg'></div>
	</body>
</html>
