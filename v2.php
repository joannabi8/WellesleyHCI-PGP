<!--
	v2.php
	2/21/14
	Second visualization test for personal genomic project user test
	Nicole Francisco, Kara Lu
	for Wellesley College HCI Lab

	Updated by Claire Schlenker 
	4 June 2014
-->

<!DOCTYPE>
<html>
	<head>
		<title>PGHCI Visualization: TreeMap</title>

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

				// Load Google TreeMap
				google.load('visualization', '1', {
					"packages": ['treemap'],
					"callback": treeMapLoaded
				});

			});
			
		</script>
<!--ADDED STUFF HERE -->
          <script type="text/javascript" src="https://www.google.com/jsapi"></script>

          <script type="text/javascript">


            google.load('visualization', '1', {packages: ['treemap']});
          </script>
          <script type="text/javascript">


          var allData = [['FUT2-W154X', 'Moderate', '2', 'Recessive, Carrier (Heterozygous)', '1', 'Well-established protective', '0.49', '49%', 'This recessive protective variant confers resistance to norovirus (which causes stomach flu). 20% of Caucasians and Africans are homozygous for this variant and are \"non-secretors\": they do not express ABO blood type antigens in their saliva or mucosal surfaces. Most strains of norovirus bind to these antigens in the gut and so this non-secretor status confers almost total resistantance to most types of norovirus. There are notable exceptions some strains of norovirus bind a different target and are equally infectious for secretors and non-secretors.'], ['MYO1A-S797F', 'Moderate', '2', 'Dominant, Heterozygous', '7', 'Uncertain pathogenic', '0.0047', '0.47%', 'Although reported to cause dominant early-onset sensorineural hearing loss this variant has been reported in the genome of an unaffected PGP participant.'], ['C3-R102G', 'Moderate', '2', 'Complex/Other, Heterozygous', '8', 'Likely pathogenic', '0.15', '15%', 'This variant (also called C3F) is common in Europeans (10.2% allele frequency) and is associated with age-related macular degeneration. In the US 1.5% of adults over 40 have the disease but the incidence increases strongly with age (>15% in women over 80). Assuming an average lifetime risk of ~10% heterozygous individuals have a ~13% risk and homozygous have ~20%.'], ['SIAE-M89V', 'Moderate', '2', 'Recessive, Carrier (Heterozygous)', '7', 'Uncertain pathogenic', '0.04', '4.00%', 'This variant was reported to be associated with autoimmune disease when homozygous. However a later publication has contradicted this result finding no significant association between this variant and autoimmune disease in a very large cohort.'], ['WFS1-R611H', 'Low', '1', 'Recessive, Carrier (Heterozygous)', '7', 'Uncertain pathogenic', '0.4', '40%', 'This nonsynonymous SNP is associated with Wolfram Syndrome (known as DIDMOAD) which is characterized by early-onset non-autoimmune diabetes mellitus diabetes insipidus optic atrophy and deafness) and to adult Type Two Diabetes Mellitus. The WFS1 gene maps to chromosome 4p16.3. The variant has been shown to be statistically associated with type II diabetes in six UK studies and one study of Ashkenazi Jews (Sandhu M. et al. Minton et al.).'], ['LYST-R159K', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.0078', '0.78%', 'Rare and unreported tentatively evaluated as benign. Some severe mutations in this gene cause Chediak-Higashi syndrome (a severe genetic disorder causing albinism neuropathy and life-threatening susceptibility to bacterial infections) but this disease is rare and there are many other genomes with rare missense polymorphisms.'], ['TGIF1-P83Shift', 'Low', '1', 'Complex/Other, Heterozygous', '7', 'Uncertain pathogenic', '0.14', '14%', 'Severe variants in this gene are associated with holoprosencephaly disorders when combined with loss-of-function variants in SHH. Haploinsufficiency was identified in some families with this condition. It is unclear how likely this variant is to occur in combination with an SHH variant or what phenotypic effect the variant would have on its own.'], ['IL7R-T244I', 'Low', '1', 'Unknown, Heterozygous', '2', 'Likely protective', '0.21', '21%', 'The reference genome variant for this allele has been associated with a slight increased risk of multiple sclerosis. Thus this variant can be treated as a protective variant -- carriers of this variant are slightly less likely to have MS. Because the disease is rare and the effect of this variant is not very strong the absolute decreased risk for carriers of this variant is less than .05% (less than 1 in 2000).'], ['NEFL-S472Shift', 'Low', '1', 'Unknown, Homozygous', '5', 'Likely benign', '?', '?', 'Although a frameshift in this gene would be predicted to cause Charcot-Marie Neuropathy this particular position appears to reflect a single base insertion error/mutation in the reference genome (in other words normal individuals are always homozygous for a deletion at this position relative to reference). See chr8:24811060-24811080 annotations on UCSC.'], ['ARSA-N350S', 'Low', '1', 'Unknown, Heterozygous', '4', 'Well-established benign', '0.18', '18%', 'This common variant (HapMap 24.1% allele frequency) causes a loss of a glycosylation site (affecting the size of the protein when studied with gel electrophoresis) but does not affect enzyme activity or stability.'], ['MAPT-R370W', 'Low', '1', 'Unknown, Homozygous', '6', 'Uncertain benign', '0.16', '16%', 'Probably benign.'], ['MTRR-I49M', 'Low', '1', 'Recessive, Carrier (Heterozygous)', '8', 'Likely pathogenic', '0.45', '45%', 'This common variant (HapMap allele frequency of 31.3%) in a protein involved in folate (B9) and cobalamin (B12) metabolism and is often reported as \"MTRR I22M\" (an alternative transcript position). Mothers homozygous for this variant are associated with having around a increased chance of a child with Down syndrome (risk of 0.4% average risk in population is 0.25%). Notably age plays a far larger role in the rate of Down syndrome (risk is 4.5% for a mother 45-years-of-age) and it is unknown how this variant may combine with the effect of age. There are conflicting reports associating this variant with incidence of neural tube defects possibly when combined with MTHFR A222V.'], ['SP110-L425S', 'Low', '1', 'Complex/Other, Heterozygous', '7', 'Uncertain pathogenic', '0.86', '86%', 'This variant is associated with a slightly increased risk of tuberculosis. It is unclear whether it is itself causal or in linkage disequilibrium with some other causal variant that has a stronger effect.'], ['ELN-G581R', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.073', '7.30%', 'Probably a benign SNP not rare (4.8% allele frequency in GET-Evidence data).'], ['DTNBP1-P272S', 'Low', '1', 'Recessive, Carrier (Heterozygous)', '3', 'Uncertain protective', '0.035', '3.50%', 'Possibly a slight protective effect against colorectal cancer if homozygous.'], ['ACAD8-S171C', 'Low', '1', 'Recessive, Carrier (Heterozygous)', '7', 'Uncertain pathogenic', '0.018', '1.80%', 'This variant (a.k.a S149C) was found as a compound heterozygote (with M130T) in a male newborn of European descent with isobutyryl-CoA dehydrogenase deficiency (identified by newborn screening). Lack of controls means that significance cannot be established and allele frequency cannot be estimated. Oglesbee et al. comment that IBD-deficiency may be relatively benign most cases identified by newborn screening have remained asymptomatic but Ferreira et al. report a symptomatic individual homozygous for this variant.'], ['PKP2-L366P', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.22', '22%', 'This variant is a benign polymorphism.'], ['rs1544410', 'Low', '1', 'Unknown, Homozygous', '5', 'Uncertain pathogenic', '0.35', '35%', 'rs1544410 is a Vitamin D Receptor (VDR) single nucleotide polymorphism. It is unlikely that it has functional significance because it is located in an intron (Liu et. al.) but it is in strong linkage disequilibrium with rs731236 (Dvornyk et al) which is located in an exon.'], ['WFS1-C426Y', 'Moderate', '2', 'Dominant, Heterozygous', '7', 'Uncertain pathogenic', '0.0012', '0.12%', 'Reported in a single case of familial depression but no linkage data and no statistical significance.'], ['CYP2C9-R144C', 'Moderate', '2', 'Unknown, Heterozygous', '6', 'Well-established pathogenic ', '0.097', '9.70%', 'This variant also called CYP2C9*2 is a pharmacogenetic variant that modulates sensitivity for Warfarin (due to reduced metabolism). This variant is associated with Caucasians. The FDA has approved reduced recommended Warfarin dosage based on the presence of this variant.'], ['TLR5-R392X', 'Low', '1', 'Complex/Other, Heterozygous', '7', 'Uncertain pathogenic', '0.04', '4%', 'This variant is believed to impair the ability to generate an immune response to the flagella of the bacteria. It is weakly associated with an increased incidence of Legionnaires\' Disease p = 0.085 increased lifetime risk of disease ~0.88% (about twice average). The variant is also weakly associated with a reduced incidence of systemic lupus erythematosus p = 0.165.'], ['MSH2-G322D', 'Low', '1', 'Unknown, Heterozygous', '5', 'Likely benign', '0.011', '1.10%', 'Although other variants in this mismatch repair gene are associated with cancer most publications dismiss this variant as a polymorphism (HapMap allele frequency of 1.6%).'], ['BBS7-D412G', 'High', '3', 'Recessive, Carrier (Heterozygous)', '7', 'Uncertain pathogenic', '0.002', '0.20%', 'Predicted to have damaging effect other mutations in this gene have been implicated in causing Bardet-Biedl syndrome in a recessive manner.'], ['LIG4-A3V', 'Low', '1', 'Dominant, Heterozygous', '3', 'Uncertain protective', '0.036', '3.60%', 'One report has associated this with a decreased risk of multiple myeloma.'], ['HFE-H63D', 'Low', '1', 'Recessive, Carrier (Heterozygous)', '7', 'Uncertain pathogenic', '0.11', '11%', 'There have been some hypotheses that this variant contributes to causing hereditary hemachromatosis possibly as a compound heterozygote but some others treat it as a polymorphism. Cys282Tyr is the classic causal variant and itself has very low penetrance. Mouse studies indicates this variant has a similar but weaker effect; if it has any effect at all its penetrance may be quite low and/or require modifier alleles.'], ['COL5A2-P460S', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.04', '4.00%', 'Tentatively benign. Although predicted to be damaging by Polyphen 2 this variant is seen in 2 out of 62 PGP & public genomes. OMIM lists other more disruptive variants (frameshift & nonsense) as reported to cause Ehlers-Danlos syndrome when homozygous.'], ['DSP-R1537C', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.01', '1.00%', 'Probably benign / nonpathogenic.'], ['ADA-K80R', 'Low', '1', 'Recessive, Carrier (Heterozygous)', '5', 'Likely benign', '0.064', '6.40%', 'This variant has a 3.5% allele frequency in 1000 genomes data. Although OMIM links this to disease the paper they reference uses in vitro data to conclude that this is a functionally neutral polymorphism.'], ['FANCI-P55L', 'Low', '1', 'Unknown, Heterozygous', '5', 'Likely benignUnknown', ' Heterozygous', '0.051', '5.10%Probably benign.'], ['SERPINA1-E288V', 'Low', '1', 'Recessive, Carrier (Heterozygous)', '9', 'Well-established pathogenic ', '0.03', '3.00%', 'This variant represents the PiS variant in alpha-1-antitrypsin deficiency where a homozygous individual has 60% enzymatic activity. This variant alone is unlikely to much effect but 3-4% of heterozygotes are compound heterozygous with the more severe PiZ variant which is associated with an increased risk of emphysema and COPD.'], ['CASP8-M1T', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.031', '3.10%', 'Probably benign. Although start codons can be extremely disruptive and this gene is implicated in a rare disease (autoimmune lymphoproliferative syndrome) the allele frequency for this variant (2-3%) is high enough to contradict such a strong pathogenic effect. This may be because the gene has many other transcripts that do not include this position as exonic.'], ['Variant', 'Clnical Importance Category', 'Clinical Importance', 'Status,Impact quant', 'Impact', 'Frequency', 'Allele Frequency', 'Summary', ''], ['KCNJ11-K23E', 'Low', '1', 'Unknown, Homozygous', '2', 'Likely protective', '0.74', '74%', 'This variant is associated with decreased risk of type 2 diabetes. It is unclear whether this variant has additive effects or acts in a dominant or recessive manner. Assuming diabetes has a lifetime risk of 36% we estimate a decreased risk of around 1-2% per copy of this variant.'], ['PKD1-A4059V', 'Low', '1', 'Unknown, Heterozygous', '5', 'Likely benign', '0.057', '5.70%', 'Probably benign.'], ['FIG4-K278Shift', 'Moderate', '2', 'Recessive, Carrier (Heterozygous)', '7', 'Uncertain pathogenic', '0.0078', '0.78%', 'This variant is predicted to cause a frameshift and may cause Charcot-Marie-Tooth Disease Type 4J in an autosomal recessive manner. Other variants in this gene which cause frameshift and premature termination have been implicated in causing this disease when compound heterozygous with another FIG4 variant.'], ['COL9A2-T246M', 'Low', '1', 'Unknown, Heterozygous', '5', 'Likely benign', '0.025', '2.50%', 'Probably benign.'], ['RYR2-G1885E', 'High', '3', 'Recessive, Carrier (Heterozygous)', '7', 'Uncertain pathogenic', '0.018', '1.80%', 'Reported to cause arrhythmogenic right ventricular cardiomyopathy when compound heterozygous with G1886S although this finding is weakened after correcting for multiple hypotheses and it is unclear what penetrance such a genotype might have if it is causal.'], ['CACNA1S-L458H', 'Low', '1', 'Unknown, Heterozygous', '5', 'Likely benign', '0.27', '27%', 'Common polymorphism'], ['TXNDC3-I338T', 'Low', '1', 'Unknown, Homozygous', '6', 'Uncertain benign', '0.038', '3.80%', 'Tentatively classified as benign but predicted to be damaging and other variants in this gene are implicated in causing primary ciliary dyskinesia (situs inversus chronic sinusitis and bronchiectasis).'], ['TCIRG1-R56W', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.044', '4.40%', 'Probably benign. One publication implicates the variant in causing osteopetrosis but this is contradicted by the relatively high allele frequency for the variant in Caucasians (5% 1 in 400 homozygous) while that disease is extremely rare (1 in 250000).'], ['RP1-N985Y', 'Low', '1', 'Unknown, Homozygous', '6', 'Uncertain benign', '0.35', '35%', 'Probably benign. One report linked this variant to high triglycerides but a later paper found a nearby SNP with similar association and suggests that both findings are caused by linkage to an undiscovered causal variant.'], ['RNASEL-R462Q', 'Low', '1', 'Complex/Other, Heterozygous', '7', 'Uncertain pathogenic', '0.28', '28%', 'Associated with increased risk of prostate cancer in individuals who already have a family history of prostate cancer but studies have been unable to replicate this finding in sporadic (non-familial) prostate cancer cases.'], ['PTCH1-P1315L', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.3', '30%', 'Common polymorphism presumed benign.'], ['SERPINA1-E366K', 'High', '3', 'Recessive, Carrier (Heterozygous)', '9', 'Well-established pathogenic ', '0.012', '1.20%', 'This is also called the \"Pi Z\" or \"Z\" allele. When homozygous (acting in a recessive manner) this variant is the major cause of severe alpha-1-antitrypsin deficiency (95% of cases) which often leads to emphysema or chronic obstructive pulmonary disease (COPD) and liver disease in adults and children. Heterozygosity for this variant may also be associated with increased rate of lung or liver problems especially when combined with another variant with reduced function (compound heterozygous).'], ['MUSK-T100M', 'Low', '1', 'Unknown, Heterozygous', '6', 'Uncertain benign', '0.023', '2.30%', 'Probably benign.']];


            function getInfo(id, num, a){
                for (var i=0; i<a.length; i++){
                  if (a[i][0] === id){

                    //Split summary into lines so box isn't too horizontal. 
                    var result = a[i][num].match(/\b[\w']+(?:[^\w\n]+[\w']+){0,14}\b/g);
                    var stringResult = "";
                    for (var j=0; j<result.length; j++){
                      stringResult = stringResult + result[j] + "<br>";
                    }
                    //return a[i][num];
                    return stringResult;
                  }
                }
                return "NOT EXIST";
            }

            function getOtherInfo(id, num, a){
                for (var i=0; i<a.length; i++){
                  if (a[i][0] === id){

                    return a[i][num];
                  }
                }
                return "NOT EXIST";
            }

          

            //var dict = eval("(" + allData+ ")");
            //var d = JSON.parse(allData);
            console.log("HEY");
            //console.log(allData['TLR5-R392X']);

            function drawVisualization(){
              drawVisualization(0);
            }


            function drawVisualization(level) {
              console.log(getSelection);
              console.log("HELLO");
              document.getElementById("low").disabled = false;
              document.getElementById("medium").disabled = false;
              document.getElementById("high").disabled = false;
            

              var data = google.visualization.arrayToDataTable([    //these all have the same size. 
                ['PG',                     'Parent',                      'Frequency (size)',     'Impact of Variant (color)', 'Summary'],
                ['Global',                    null,                            0,                               0,            'Null'],
                ['Low Clinical Impact',       'Global',                            0,                               0,           'Null'],
                ['Medium Clinical Impact',    'Global',                            0,                                0,           'Null'],
                ['High Clinical Impact',    'Global',                            0,                                0,           'Null'],
                ['SERPINA1-E288V',    'Low Clinical Impact',                  1,                              1,           getInfo('SERPINA1-E288V',8,allData)],
                ['MTRR-I49M',         'Low Clinical Impact',                  1,                               2,           getInfo('MTRR-I49M',8,allData)],
                ['RNASEL-R462Q',      'Low Clinical Impact',                  1,                               3,           getInfo('RNASEL-R462Q',8,allData)], 
                ['TGIF1-P83Shift',    'Low Clinical Impact',                  1,                               3,           getInfo('TGIF1-P83Shift',8,allData)],
                ['TLR5-R392X',        'Low Clinical Impact',                  1,                               3,           getInfo('TLR5-R392X',8,allData)],
                ['SP110-L425S',       'Low Clinical Impact',                  1,                               3,           getInfo('SP110-L425S',8,allData)],
                ['WFS1-R611H',        'Low Clinical Impact',                  1,                                3,           getInfo('WFS1-R611H',8,allData)],
                ['HFE-H63D',          'Low Clinical Impact',                  1,                               3,           getInfo('HFE-H63D',8,allData)],
                ['ACAD8-S171C',       'Low Clinical Impact',                  1,                              3,           getInfo('ACAD8-S171C',8,allData)],
                ['COL5A2-P460S',      'Low Clinical Impact',                  1,                               4,           getInfo('COL5A2-P460S',8,allData)], 
                ['CASP8-M1T',         'Low Clinical Impact',                  1,                              4,           getInfo('CASP8-M1T',8,allData)], 
                ['PKP2-L366P',        'Low Clinical Impact',                  1,                               4,           getInfo('PKP2-L366P',8,allData)], 
                ['RP1-N985Y',         'Low Clinical Impact',                  1,                               4,           getInfo('RP1-N985Y',8,allData)], 
                ['DSP-R1537C',        'Low Clinical Impact',                  1,                               4,           getInfo('DSP-R1537C',8,allData)], 
                ['ELN-G581R',         'Low Clinical Impact',                  1,                              4,           getInfo('ELN-G581R',8,allData)], 
                ['LYST-R159K',        'Low Clinical Impact',                  1,                             4,           getInfo('LYST-R159K',8,allData)], 
                ['MAPT-R370W',        'Low Clinical Impact',                  1,                               4,           getInfo('MAPT-R370W',8,allData)], 
                ['TCIRG1-R56W',       'Low Clinical Impact',                  1,                              4,           getInfo('TCIRG1-R56W',8,allData)], 
                ['PTCH1-P1315L',      'Low Clinical Impact',                  1,                                4,           getInfo('PTCH1-P1315L',8,allData)], 
                ['TXNDC3-I338T',      'Low Clinical Impact',                  1,                              4,           getInfo('TXNDC3-I338T',8,allData)], 
                ['MUSK-T100M',        'Low Clinical Impact',                  1,                               4,           getInfo('MUSK-T100M',8,allData)],
                ['rs1544410',         'Low Clinical Impact',                  1,                               5,           getInfo('rs1544410',8,allData)],
                ['MSH2-G322D',        'Low Clinical Impact',                  1,                              5,           getInfo('MSH2-G322D',8,allData)], 
                ['CACNA1S-L458H',     'Low Clinical Impact',                  1,                               5,           getInfo('CACNA1S-L458H',8,allData)], 
                ['ADA-K80R',          'Low Clinical Impact',                  1,                              5,           getInfo('ADA-K80R',8,allData)], 
                ['COL9A2-T246M',      'Low Clinical Impact',                  1,                              5,           getInfo('COL9A2-T246M',8,allData)], 
                ['FANCI-P55L',        'Low Clinical Impact',                  1,                              5,           getInfo('FANCI-P55L',8,allData)], 
                ['PKD1-A4059V',       'Low Clinical Impact',                  1,                              5,           getInfo('PKD1-A4059V',8,allData)], 
                ['ARSA-N350S',        'Low Clinical Impact',                  1,                               6,           getInfo('ARSA-N350S',8,allData)],
                ['LIG4-A3V',          'Low Clinical Impact',                  1,                              7,           getInfo('LIG4-A3V',8,allData)], 
                ['DTNBP1-P272S',      'Low Clinical Impact',                  1,                              7,           getInfo('DTNBP1-P272S',8,allData)], 
                ['IL7R-T244I',        'Low Clinical Impact',                  1,                               8,           getInfo('IL7R-T244I',8,allData)],
                ['KCNJ11-K23E',       'Low Clinical Impact',                  1,                               8,           getInfo('KCNJ11-K23E',8,allData)],
                
                 
                
                
                ['C3-R102G',                   'Medium Clinical Impact',                  1,                               2,           getInfo('C3-R102G',8,allData)], 
                ['MYO1A-S797F',                'Medium Clinical Impact',                  1,                               3,           getInfo('MYO1A-S797F',8,allData)], 
                ['WFS1-C426Y',                 'Medium Clinical Impact',                  1,                               3,           getInfo('WFS1-C426Y',8,allData)], 
                ['SIAE-M89V',                  'Medium Clinical Impact',                  1,                               3,           getInfo('SIAE-M89V',8,allData)], 
                ['FIG4-K278Shift',             'Medium Clinical Impact',                  1,                             3,           getInfo('FIG4-K278Shift',8,allData)], 
                ['CYP2C9-R144C',               'Medium Clinical Impact',                  1,                              4,           getInfo('CYP2C9-R144C',8,allData)], 
                ['FUT2-W154X',                 'Medium Clinical Impact',                  1,                               9,           getInfo('FUT2-W154X',8,allData)],
                ['SERPINA1-E366K',       'High Clinical Impact',                  1,                               1,                       getInfo('SERPINA1-E366K',8,allData)],  
                ['BBS7-D412G',           'High Clinical Impact',                  1,                               3,                       getInfo('BBS7-D412G',8,allData)], 
                ['RYR2-G1885E',          'High Clinical Impact',                  1,                               3,                       getInfo('RYR2-G1885E',8,allData)]
                                                                                             
              ]);

              
              // Create and draw the visualization.
              var treemap = new google.visualization.TreeMap(document.getElementById('visualization'));
      
              treemap.draw(data, {
                generateTooltip: showFullTooltip,
                minColor: 'red',
                midColor: 'white',
                maxColor:'#1E90FF',
                //maxColor: '#0d0',
                headerHeight: 20,
                fontColor: 'black'});
                //showScale: true});

                //treemap.setSelection([{'row':1}]);
                if (level === "low"){
                  treemap.setSelection([{'row':1}]);
                } else if (level === "medium"){
                  treemap.setSelection([{'row':2}]);
                } else if (level === "high"){
                  treemap.setSelection([{'row':3}]);
                } else {
                  document.getElementById("low").disabled = false;
                  document.getElementById("medium").disabled = false;
                  document.getElementById("high").disabled = false;
                  document.getElementById("back").disabled =true;

                }

                
               // var chart = new google.visualization.TreeMap(document.getElementById('visualization'));
            google.visualization.events.addListener(treemap,'select', whenSelected);
            google.visualization.events.addListener(treemap,'rollup', whenRightClicked);
            function whenRightClicked(e){
              document.getElementById("low").disabled = false;
              document.getElementById("medium").disabled = false;
              document.getElementById("high").disabled = false;
              document.getElementById("back").disabled =true;
            }

            function whenSelected(e){
              console.log("THIS IS SELECTED ");
              console.log(treemap.getSelection());
              console.log(JSON.stringify(treemap.getSelection()));
              console.log(treemap.getSelection()[0]);

              selection = [{row:1,column:null}];
              console.log("THIS SHOULD NOT PRINT");
              console.log(selection);
              

              sel = getSelection();
              console.log(sel.length);
              for (var i=0; i<sel.length; i++){
                console.log(sel[i]);
              }
              console.log(getSelection().anchorNode);
              console.log(getSelection().anchorNode.nodeValue + ".");
              if (getSelection().anchorNode.nodeValue === "Low Clinical Impact"){
                document.getElementById("low").disabled = true;
                document.getElementById("medium").disabled = false;
                document.getElementById("high").disabled = false;
                document.getElementById("back").disabled = false;
              } else if(getSelection().anchorNode.nodeValue === "Medium Clinical Impact"){
                document.getElementById("low").disabled = false;
                document.getElementById("medium").disabled = true;
                document.getElementById("high").disabled = false;
                document.getElementById("back").disabled = false;
              }
              else if(getSelection().anchorNode.nodeValue === "High Clinical Impact"){
                document.getElementById("low").disabled = false;
                document.getElementById("medium").disabled = false;
                document.getElementById("high").disabled = true;
                document.getElementById("back").disabled = false;
              }
              
              //var node_name = data.getValue( getSelection()[0].row, 0 );
              //console.log(node_name);
              return false;
            }

      
      function showFullTooltip(row,size,value){
        var id = data.getValue(row, 0);
        var parent = data.getValue(row, 1);
        //var frequency = data.getValue(row, 2); // all frequencies are the same. so not helpful. 
        var impact = data.getValue(row, 3);

        var summary = data.getValue(row, 4);

        var frequency = getOtherInfo(id, 6, allData);
        var status = getOtherInfo(id, 3, allData);

        var url = "http://evidence.pgp-hms.org/"+ id;

        if (parent == 'Global'){
          var level = id.split(" ")[0];
          var text = 'Click here to view genome reports of ' + level.toLowerCase() + ' clinical impact';
        } else {
          var text =
                  '<i>Variant: </i>' + id + '<br>' + 
                  '<i>Clinical Importance: </i>' + parent + '<br>' + 
                  '<i>Impact: </i>' + impact  + '<br>' + 
                  '<i>Status: </i>' + status + '<br>' +  
                  '<i>Frequency: </i>' + frequency + '<br>' + 
                  '<i>Summary: </i>' + summary + '<br>' + 
                  '<a href=' + url + ' target="_blank">Click here for more information</a>' + 
                   '</div>';
        }
      
      return '<div style="background:#fd9; padding:10px; border-style:solid; font-size: 70%">' +
                 '<span style="font-family:Arial">' +
                  text;
        }
              
               //google.visualization.events.addListener(treemap, 'onmouseover',MouseOver);
              
               //function MouseOver(e) {
                //     var selection = treemap.getSelection();
                     //var node_name = data.getValue( selection[0].row, 0 );
                     //document.getElementById('display').innerHTML= "Node Name:" + node_name ;
               //}
            }

            

            



            function back(){
              drawVisualization(); // redraw visualization
              document.getElementById("low").disabled = false;
              document.getElementById("medium").disabled = false;
              document.getElementById("high").disabled = false;
              document.getElementById("back").disabled = true;

            }

            function low(){
              drawVisualization("low");
              document.getElementById("low").disabled = true;
              document.getElementById("medium").disabled = false;
              document.getElementById("high").disabled = false;
              document.getElementById("back").disabled = false;
            }

            function medium(){
              drawVisualization("medium");
              document.getElementById("low").disabled = false;
              document.getElementById("medium").disabled = true;
              document.getElementById("high").disabled = false;
              document.getElementById("back").disabled = false;
            }

            function high(){
              drawVisualization("high");
              document.getElementById("low").disabled = false;
              document.getElementById("medium").disabled = false;
              document.getElementById("high").disabled = true;
              document.getElementById("back").disabled = false;
            }


      
           google.setOnLoadCallback(drawVisualization);
          </script>		
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<span class="brand"><img src="assets/img/dna.png"> Jamie's Personal Genomics Report</span>
				</div>
			</div>
		</div>
		
		<div class="container" id="study_wrapper">
			<h2>Instructions for the Study</h2>
			<p>Following is a report that is based on an individual's personal genomic information. For the purpose of this study we will name this individual Jamie. Read the explanation below carefully and then study Jamie's report. You will be asked questions about this report.</p>
			<p>The report was created by comparing Jamie's genome and a database of gene variants that are known to be associated with medical conditions. Only gene variants that are found to be medically relevant are reported.</p>
			<p>The report displays a TreeMap visualization of gene variants. Treemaps display hierarchical data as a set of nested rectangles. In the report below you can see that at the Overview level the Treemap presents three categories: low clinical importance, medium clinical importance, and high clinical importance.</p>
			<p>Upon clicking on one of these categories, the treemap presents a collection of rectangles, each represents a gene variant. The color of a gene variant represents its potential impact. Red rectangles represent pathogenic gene variants, white rectangles represent benign gene variants, and blue rectangles represent protective gene variants. The saturation (i.e. intensity) of a color represents the certainty of the impact. For example, red gene variants are well established pathogenic but pink gene variants are only likely, or possibly, pathogenic.</p>
			<p>For each gene variant the TreeMap presents its name, and upon hovering additional information is provided including a summary about the medical conditions the gene variants is associated with.</p>
			<p>Use the buttons above the visualization to navigate the TreeMap visualization.</p>
			<p>Study Jamie’s report carefully, then answer the questions following the report.</p>

			<h2>Jamie's Results</h2>
<!--ADDED STUFF HERE -->

            <!-- Dimensions in the next line! -->

            <button type="button" style="margin:8px 8px 0px 8px" id="back" onclick ="back()">Back to top level</button><br>
            <button type="button" style="margin:8px 8px 8px 8px" id="low" onclick="low()">View Low Clinical Importance</button>
            <button type="button" style="margin:8px 8px 8px 0px" id="medium" onclick="medium()">View Medium Clinical Importance</button>
            <button type="button" style="margin:8px 8px 8px 0px" id="high" onclick="high()">View High Clinical Importance</button>
          <div>

          <div id="visualization" style="width: 600px; height: 400px;"></div>
              </div>
<!-- END STUFF HERE -->
			<!--<embed width="900" height="500" src="tree.html" scale="tofit" frameborder="5"></embed>-->
		<!--	<div id="visualization">
				<div id="vis_low"></div>
				<div id="vis_mod"></div>
				<div id="vis_high"></div>
			</div>-->
			<h2>Questions About the Report</h2>
				<p>Please answer the following questions based on Jamie's report. Feel free to <strong>revisit the report</strong> as needed in order to answer the questions correctly.</p>
				<form action="vis_process.php" method="post" id="v2_q">
	
					<label for="v2_q1"><strong>The number of variants with high clinical importance:</strong></label>
					<input type="text" name="v2_q1" id="v2_q1">
					
					<label for="v2_q2"><strong>The number of variants that are well-established pathogenic:</strong></label>
					<input type="text" name="v2_q2" id="v2_q2">

					<label for="v2_q3"><strong>Based on the information above, the number of variants in Jamie's report with low clinical importance is <span id="v2_q3text">________</span> the number of variants with high clinical importance.</strong></label>
					<label class="radio" for="v2_q3_A">
						<input type="radio" name="v2_q3" id="v2_q3_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v2_q3_B">
						<input type="radio" name="v2_q3" id="v2_q3_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v2_q3_C">
						<input type="radio" name="v2_q3" id="v2_q3_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v2_q3_D">
						<input type="radio" name="v2_q3" id="v2_q3_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

			
					<label for="v2_q4"><strong>Based on the information above, the number of uncertain pathogenic variants in Jamie's report is <span id="v2_q4text">________</span> the number of well established pathogenic variants.</strong></label>
					<label class="radio" for="v2_q4_A">
						<input type="radio" name="v2_q4" id="v2_q4_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v2_q4_B">
						<input type="radio" name="v2_q4" id="v2_q4_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v2_q4_C">
						<input type="radio" name="v2_q4" id="v2_q4_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v2_q4_D">
						<input type="radio" name="v2_q4" id="v2_q4_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

					<p><strong>Based on the information above, the number of potentially pathogenic variants in Jamie's report is <span id="v2_q5text">________</span> the number of potentially benign or protective variants.</strong></p>
					
					<label class="radio" for="v2_q5_A">
						<input type="radio" name="v2_q5" id="v2_q5_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v2_q5_B">
						<input type="radio" name="v2_q5" id="v2_q5_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v2_q5_C">
						<input type="radio" name="v2_q5" id="v2_q5_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v2_q5_D">
						<input type="radio" name="v2_q5" id="v2_q5_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>


					<p><strong>Which variants would Jamie be most likely to discuss with a healthcare provider?</strong>
					<textarea name="v2_q6" id="v2_q6" cols="30" rows="5"></textarea>
					
					

					<p><strong>Based on the information above, Jamie's risk of developing stomach flu is <span id="v2_q7text">________</span> the average person.</strong>
					<label class="radio" for="v2_q7_A">
						<input type="radio" name="v2_q7" id="v2_q7_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v2_q7_B">
						<input type="radio" name="v2_q7" id="v2_q7_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v2_q7_C">
						<input type="radio" name="v2_q7" id="v2_q7_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v2_q7_D">
						<input type="radio" name="v2_q7" id="v2_q7_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

					<p><strong>Based on the information above, Jamie's risk of developing age-related macular degeneration is <span id="v2_q8text">________</span> the average person?</strong>
					<label class="radio" for="v2_q8_A">
						<input type="radio" name="v2_q8" id="v2_q8_A" value="greater" onchange="changetext(this.name, this.value);">Greater than
					</label>
					<label class="radio" for="v2_q8_B">
						<input type="radio" name="v2_q8" id="v2_q8_B" value="equal" onchange="changetext(this.name, this.value);">Equal
					</label>
					<label class="radio" for="v2_q8_C">
						<input type="radio" name="v2_q8" id="v2_q8_C" value="less" onchange="changetext(this.name, this.value);">Less than
					</label>
					<label class="radio" for="v2_q8_D">
						<input type="radio" name="v2_q8" id="v2_q8_D" value="dunno" onchange="changetext(this.name, this.value);">I don't know
					</label>

					<p><strong>If you were Jamie, knowing this information, which of the following conditions would you be interested in learning more about? Select all that apply.</strong>
			<label><input type="checkbox" name="q9a"  value="alzheimers">Alzheimer's</label>
			<input type="hidden" name="q9b">
			<label><input type="checkbox" name="q9b"  value="parkinsons">Parkinson's</label>
			<input type="hidden" name="q9c">
			<label><input type="checkbox" name="q9c"  value="liver">Liver Disease</label>
			<input type="hidden" name="q9d">
			<label><input type="checkbox" name="q9d"  value="colon">Colon Cancer</label>
			<input type="hidden" name="q9e">
			<label><input type="checkbox" name="q9e"  value="diabetes">Diabetes</label>
			<input type="hidden" name="q9f">
			<label><input type="checkbox" name="q9f"  value="emphysema">Emphysema</label>
			<input type="hidden" name="q9g">
			<label><input type="checkbox" name="q9g"  value="tuberculosis">Tubercolosis</label>
			<input type="hidden" name="q9h">
			<label><input type="checkbox" name="q9h"  value="eye">Eye Disease</label>

					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th style="width:80px;"><strong>Statement</strong></th>
								<th style="width:80px;"><strong>Strongly disagree</strong></th>
								<th style="width:80px;"><strong>Disagree</strong></th>
								<th style="width:80px;"><strong>Somewhat disagree</strong></th>
								<th style="width:80px;"><strong>Neither agree or disagree</strong></th>
								<th style="width:80px;"><strong>Somewhat agree</strong></th>
								<th style="width:80px;"><strong>Agree</strong></th>
								<th style="width:80px;"><strong>Strongly agree</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>The information in the report was presented in an accessible manner.</td>
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
								<td>Jamie's genes determine everything about them and their future.</td>
								<td><input type="radio" name="v2_q10_c" value="1"></td>
								<td><input type="radio" name="v2_q10_c" value="2"></td>
								<td><input type="radio" name="v2_q10_c" value="3"></td>
								<td><input type="radio" name="v2_q10_c" value="4"></td>
								<td><input type="radio" name="v2_q10_c" value="5"></td>
								<td><input type="radio" name="v2_q10_c" value="6"></td>
								<td><input type="radio" name="v2_q10_c" value="7"></td>
							</tr>
							<tr>
								<td>If I were Jamie, I would need the help of a healthcare professional to understand the results in the report.</td>
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
					
					<label for="v2_q11">Please use the space below to tell us which features were most helpful for understanding the report.</label>
					<textarea name="v2_q11" id="v2_q11" cols="30" rows="5"></textarea>
					

					<label for="v2_q12">Please use the space below to tell us how we can improve the report to make it easier to understand.</label>
					<textarea name="v2_q12" id="v2_q12" cols="30" rows="5"></textarea>
					
				<input class="btn btn-primary submit-survey" type="submit" name="Submit" value="Continue" id="Submit_v2">
			</form>
		</div>
		<div class="alert alert-block" id='validate_msg'></div>
	</body>
	<script>
		function changetext(name, value) {
			var spanid = name + "text"; 
			console.log(spanid);
			var el = document.getElementById(spanid);
			if (value === "greater") {
				el.innerHTML = "<strong>GREATER THAN</strong>";
				el.style.color = "blue";
			} else if (value === "equal") {
				el.innerHTML = "<strong>EQUAL TO</strong>";
				el.style.color = "blue";
			} else if (value === "less") {
				el.innerHTML = "<strong>LESS THAN</strong>";
				el.style.color = "blue";
			} else if (value === "dunno") {
				el.innerHTML = "<strong>???</strong>";
				el.style.color = "blue";
			}
		}
		</script>
</html>
