SELECT T1.ReNum as recibo, T4.REFecha as FechaEmision, T1.REChTaEf as formapago, T1.RETotal as total , T1.CAImpCC as pendlig,


T1.CONumer, T1.BcoTipo, T4.REAlmCve,  T1.CODesc, T4.REMonGlob, T4.ReTipGlob, 
T1.CAImpCC,  T1.RERengl, 
T1.[REmpIVA], T1.[RESubTot], T3.[BcoNombre],  T4.[REClienNom], T4.[RECteNo], T2.[COTpo], T4.[REStatus],
 T2.[CoAnti], T1.[CAStCC] 
FROM ((([CARECIB1] T1 WITH (NOLOCK) 
LEFT JOIN [CACATCOB] T2 WITH (NOLOCK) ON T2.[CONumer] = T1.[CONumer]) 
LEFT JOIN [CNTIPOBA] T3 WITH (NOLOCK) ON T3.[BcoTipo] = T1.[BcoTipo]) INNER JOIN [CARECIBO] T4 WITH (NOLOCK) ON T4.[ReNum] = T1.[ReNum]) 
WHERE 
(T4.[REFecha] >= '2011/01/19' and T4.[REFecha] <= '2011/04/19') 

AND 
T4.[REStatus] = 'LP'
AND (T4.[REAlmCve] = 1)
and ( T2.[COTpo] = 'REF' or T2.[COTpo] = 'RER')
and t1.CONumer = 108
and T1.[CAStCC] <> 'CC'
ORDER BY T2.[COTpo] DESC
, T4.[RECteNo], T4.[REFecha] 