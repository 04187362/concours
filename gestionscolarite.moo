<?xml version="1.0" encoding="UTF-8"?>
<?PowerDesigner AppLocale="UTF16" ID="{0E0701B2-CDFD-4791-A496-C8D6F5A8ECE4}" Label="" LastModificationDate="1565503322" Name="gestionscolarite" Objects="153" Symbols="52" Target="Java" TargetLink="Reference" Type="{18112060-1A4B-11D1-83D9-444553540000}" signature="CLD_OBJECT_MODEL" version="15.1.0.2850"?>
<!-- Veuillez ne pas modifier ce fichier -->

<Model xmlns:a="attribute" xmlns:c="collection" xmlns:o="object">

<o:RootObject Id="o1">
<c:Children>
<o:Model Id="o2">
<a:ObjectID>0E0701B2-CDFD-4791-A496-C8D6F5A8ECE4</a:ObjectID>
<a:Name>gestionscolarite</a:Name>
<a:Code>gestionscolarite</a:Code>
<a:CreationDate>1565266742</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565448561</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:PackageOptionsText>[FolderOptions]

[FolderOptions\Class Diagram Objects]
GenerationCheckModel=Yes
GenerationPath=
GenerationOptions=
GenerationTasks=
GenerationTargets=
GenerationSelections=</a:PackageOptionsText>
<a:ModelOptionsText>[ModelOptions]

[ModelOptions\Cld]
CaseSensitive=Yes
DisplayName=Yes
EnableTrans=Yes
EnableRequirements=No
ShowClss=No
DeftAttr=int
DeftMthd=int
DeftParm=int
DeftCont=java.util.Collection
DomnDttp=Yes
DomnChck=No
DomnRule=No
SupportDelay=No
PreviewEditable=Yes
AutoRealize=No
DttpFullName=Yes
DeftClssAttrVisi=private
VBNetPreprocessingSymbols=
CSharpPreprocessingSymbols=

[ModelOptions\Cld\NamingOptionsTemplates]

[ModelOptions\Cld\ClssNamingOptions]

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG]

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,firstLowerWord)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPCKG\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN]

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDDOMN\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS]

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,FirstUpperChar)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDCLASS\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDINTF]

[ModelOptions\Cld\ClssNamingOptions\CLDINTF\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,FirstUpperChar)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDINTF\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDACTR]

[ModelOptions\Cld\ClssNamingOptions\UCDACTR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDACTR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS]

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDUCAS\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT]

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDOBJT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG]

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\SQDMSSG\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP]

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,FirstUpperChar)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CPDCOMP\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDATTR]

[ModelOptions\Cld\ClssNamingOptions\CLDATTR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,firstLowerWord)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDATTR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD]

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,firstLowerWord)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDMETHOD\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPARM]

[ModelOptions\Cld\ClssNamingOptions\CLDPARM\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,firstLowerWord)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDPARM\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPORT]

[ModelOptions\Cld\ClssNamingOptions\OOMPORT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPORT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPART]

[ModelOptions\Cld\ClssNamingOptions\OOMPART\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMPART\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDASSC]

[ModelOptions\Cld\ClssNamingOptions\CLDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,,,firstLowerWord)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\CLDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDASSC]

[ModelOptions\Cld\ClssNamingOptions\UCDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\UCDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK]

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\GNRLLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RQLINK]

[ModelOptions\Cld\ClssNamingOptions\RQLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RQLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK]

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\RLZSLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK]

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DEPDLINK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMACTV]

[ModelOptions\Cld\ClssNamingOptions\OOMACTV\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMACTV\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\ACDOBST]

[ModelOptions\Cld\ClssNamingOptions\ACDOBST\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\ACDOBST\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\STAT]

[ModelOptions\Cld\ClssNamingOptions\STAT\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\STAT\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDNODE]

[ModelOptions\Cld\ClssNamingOptions\DPDNODE\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDNODE\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI]

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDCMPI\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDASSC]

[ModelOptions\Cld\ClssNamingOptions\DPDASSC\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DPDASSC\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMVAR]

[ModelOptions\Cld\ClssNamingOptions\OOMVAR\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\OOMVAR\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FILO]

[ModelOptions\Cld\ClssNamingOptions\FILO\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=&quot;\/:*?&lt;&gt;|&quot;
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FILO\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_. &quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ]

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMEOBJ\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMELNK]

[ModelOptions\Cld\ClssNamingOptions\FRMELNK\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\FRMELNK\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DefaultClass]

[ModelOptions\Cld\ClssNamingOptions\DefaultClass\Name]
Template=
MaxLen=254
Case=M
ValidChar=
InvldChar=
AllValid=Yes
NoAccent=No
DefaultChar=_
Script=.convert_name(%Name%,&quot;_&quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Cld\ClssNamingOptions\DefaultClass\Code]
Template=
MaxLen=254
Case=M
ValidChar=&#39;a&#39;-&#39;z&#39;,&#39;A&#39;-&#39;Z&#39;,&#39;0&#39;-&#39;9&#39;,&quot;_&quot;
InvldChar=&quot; &#39;(.)+=*/&quot;
AllValid=Yes
NoAccent=Yes
DefaultChar=_
Script=.convert_code(%Code%,&quot; &quot;)
ConvTable=
ConvTablePath=%_HOME%\Fichiers de ressources\Tables de conversion

[ModelOptions\Generate]

[ModelOptions\Generate\Cdm]
CheckModel=Yes
SaveLinks=Yes
NameToCode=No
Notation=2

[ModelOptions\Generate\Pdm]
CheckModel=Yes
SaveLinks=Yes
ORMapping=No
NameToCode=No
BuildTrgr=No
TablePrefix=
RefrUpdRule=RESTRICT
RefrDelRule=RESTRICT
IndxPKName=%TABLE%_PK
IndxAKName=%TABLE%_AK
IndxFKName=%REFR%_FK
IndxThreshold=
ColnFKName=%.3:PARENT%_%COLUMN%
ColnFKNameUse=No

[ModelOptions\Generate\Xsm]
CheckModel=Yes
SaveLinks=Yes
ORMapping=No
NameToCode=No</a:ModelOptionsText>
<c:ObjectLanguage>
<o:Shortcut Id="o3">
<a:ObjectID>D5D3603A-61C1-4148-99E3-A38FDB8BC551</a:ObjectID>
<a:Name>Java</a:Name>
<a:Code>Java</a:Code>
<a:CreationDate>1565266741</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266741</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:TargetStereotype/>
<a:TargetID>0DEDDB90-46E2-45A0-886E-411709DA0DC9</a:TargetID>
<a:TargetClassID>1811206C-1A4B-11D1-83D9-444553540000</a:TargetClassID>
</o:Shortcut>
</c:ObjectLanguage>
<c:ExtendedModelDefinitions>
<o:Shortcut Id="o4">
<a:ObjectID>42475C9E-E6B4-4D78-8711-0400B3B00F01</a:ObjectID>
<a:Name>WSDL for Java</a:Name>
<a:Code>WSDLJava</a:Code>
<a:CreationDate>1565266742</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266742</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:TargetStereotype/>
<a:TargetID>C8F5F7B2-CF9D-4E98-8301-959BB6E86C8A</a:TargetID>
<a:TargetClassID>186C8AC3-D3DC-11D3-881C-00508B03C75C</a:TargetClassID>
</o:Shortcut>
</c:ExtendedModelDefinitions>
<c:ClassDiagrams>
<o:ClassDiagram Id="o5">
<a:ObjectID>9078AAF5-3107-41F8-8C0D-773906080A67</a:ObjectID>
<a:Name>DiagrammeClasses_1</a:Name>
<a:Code>DiagrammeClasses_1</a:Code>
<a:CreationDate>1565266742</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565448561</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DisplayPreferences>[DisplayPreferences]

[DisplayPreferences\CLD]

[DisplayPreferences\General]
Adjust to text=Yes
Snap Grid=No
Constrain Labels=Yes
Display Grid=No
Show Page Delimiter=Yes
Grid size=0
Graphic unit=2
Window color=255, 255, 255
Background image=
Background mode=8
Watermark image=
Watermark mode=8
Show watermark on screen=No
Gradient mode=0
Gradient end color=255, 255, 255
Show Swimlane=No
SwimlaneVert=Yes
TreeVert=No
CompDark=0

[DisplayPreferences\Object]
Mode=2
Trunc Length=40
Word Length=40
Word Text=!&quot;&quot;#$%&amp;&#39;()*+,-./:;&lt;=&gt;?@[\]^_`{|}~
Shortcut IntIcon=Yes
Shortcut IntLoct=Yes
Shortcut IntFullPath=No
Shortcut IntLastPackage=Yes
Shortcut ExtIcon=Yes
Shortcut ExtLoct=No
Shortcut ExtFullPath=No
Shortcut ExtLastPackage=Yes
Shortcut ExtIncludeModl=Yes
EObjShowStrn=Yes
ExtendedObject.Comment=No
ExtendedObject.IconPicture=No
ExtendedObject_SymbolLayout=&lt;Form&gt;[CRLF] &lt;StandardAttribute Name=&quot;Stéréotype&quot; Attribute=&quot;Stereotype&quot; Prefix=&quot;&amp;lt;&amp;lt;&quot; Suffix=&quot;&amp;gt;&amp;gt;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;StandardAttribute Name=&quot;Nom de l&amp;#39;objet&quot; Attribute=&quot;DisplayName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;Yes&quot; /&gt;[CRLF] &lt;Separator Name=&quot;Séparateur&quot; /&gt;[CRLF] &lt;StandardAttribute Name=&quot;Commentaire&quot; Attribute=&quot;Comment&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;LEFT&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;StandardAttribute Name=&quot;Icône&quot; Attribute=&quot;IconPicture&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;Yes&quot; /&gt;[CRLF]&lt;/Form&gt;
ELnkShowStrn=Yes
ELnkShowName=Yes
ExtendedLink_SymbolLayout=&lt;Form&gt;[CRLF] &lt;Form Name=&quot;Centre&quot; &gt;[CRLF]  &lt;StandardAttribute Name=&quot;Stéréotype&quot; Attribute=&quot;Stereotype&quot; Prefix=&quot;&amp;lt;&amp;lt;&quot; Suffix=&quot;&amp;gt;&amp;gt;&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF]  &lt;StandardAttribute Name=&quot;Nom&quot; Attribute=&quot;DisplayName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;/Form&gt;[CRLF] &lt;Form Name=&quot;Source&quot; &gt;[CRLF] &lt;/Form&gt;[CRLF] &lt;Form Name=&quot;Destination&quot; &gt;[CRLF] &lt;/Form&gt;[CRLF]&lt;/Form&gt;
FileObject.Stereotype=No
FileObject.DisplayName=Yes
FileObject.LocationOrName=No
FileObject.IconPicture=No
FileObject.IconMode=Yes
FileObject_SymbolLayout=&lt;Form&gt;[CRLF] &lt;StandardAttribute Name=&quot;Stéréotype&quot; Attribute=&quot;Stereotype&quot; Prefix=&quot;&amp;lt;&amp;lt;&quot; Suffix=&quot;&amp;gt;&amp;gt;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;ExclusiveChoice Name=&quot;Choix exclusif&quot; Mandatory=&quot;Yes&quot; Display=&quot;HorizontalRadios&quot; &gt;[CRLF]  &lt;StandardAttribute Name=&quot;Nom&quot; Attribute=&quot;DisplayName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF]  &lt;StandardAttribute Name=&quot;Emplacement&quot; Attribute=&quot;LocationOrName&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;No&quot; /&gt;[CRLF] &lt;/ExclusiveChoice&gt;[CRLF] &lt;StandardAttribute Name=&quot;Icône&quot; Attribute=&quot;IconPicture&quot; Prefix=&quot;&quot; Suffix=&quot;&quot; Alignment=&quot;CNTR&quot; Caption=&quot;&quot; Mandatory=&quot;Yes&quot; /&gt;[CRLF]&lt;/Form&gt;
PckgShowStrn=Yes
Package.Comment=No
Package.IconPicture=No
Package_SymbolLayout=
Display Model Version=Yes
Class.IconPicture=No
Class_SymbolLayout=
Interface.IconPicture=No
Interface_SymbolLayout=
Port.IconPicture=No
Port_SymbolLayout=
ClssShowSttr=Yes
Class.Comment=No
ClssShowCntr=Yes
ClssShowAttr=Yes
ClssAttrTrun=No
ClssAttrMax=3
ClssShowMthd=Yes
ClssMthdTrun=No
ClssMthdMax=3
ClssShowInnr=Yes
IntfShowSttr=Yes
Interface.Comment=No
IntfShowAttr=Yes
IntfAttrTrun=No
IntfAttrMax=3
IntfShowMthd=Yes
IntfMthdTrun=No
IntfMthdMax=3
IntfShowCntr=Yes
IntfShowInnr=Yes
PortShowName=Yes
PortShowType=No
PortShowMult=No
AttrShowVisi=Yes
AttrVisiFmt=1
AttrShowStrn=Yes
AttrShowDttp=Yes
AttrShowDomn=No
AttrShowInit=Yes
MthdShowVisi=Yes
MthdVisiFmt=1
MthdShowStrn=Yes
MthdShowRttp=Yes
MthdShowParm=Yes
AsscShowName=No
AsscShowCntr=Yes
AsscShowRole=Yes
AsscShowOrdr=Yes
AsscShowMult=Yes
AsscMultStr=Yes
AsscShowStrn=No
GnrlShowName=No
GnrlShowStrn=Yes
GnrlShowCntr=Yes
RlzsShowName=No
RlzsShowStrn=Yes
RlzsShowCntr=Yes
DepdShowName=No
DepdShowStrn=Yes
DepdShowCntr=Yes
RqlkShowName=No
RqlkShowStrn=Yes
RqlkShowCntr=Yes

[DisplayPreferences\Symbol]

[DisplayPreferences\Symbol\FRMEOBJ]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=6000
Height=2000
Brush color=255 255 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=64
Brush gradient color=192 192 192
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 255 128 128
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\FRMELNK]
CENTERFont=Arial,8,N
CENTERFont color=0, 0, 0
Line style=1
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\FILO]
OBJSTRNFont=Arial,8,N
OBJSTRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LCNMFont=Arial,8,N
LCNMFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 0 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDPCKG]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=255 255 192
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 178 178 178
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDCLASS]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
CNTRFont=Arial,8,N
CNTRFont color=0, 0, 0
AttributesFont=Arial,8,N
AttributesFont color=0, 0, 0
ClassPrimaryAttributeFont=Arial,8,U
ClassPrimaryAttributeFont color=0, 0, 0
OperationsFont=Arial,8,N
OperationsFont color=0, 0, 0
InnerClassifiersFont=Arial,8,N
InnerClassifiersFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=174 228 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDINTF]
STRNFont=Arial,8,N
STRNFont color=0, 0, 0
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
CNTRFont=Arial,8,N
CNTRFont color=0, 0, 0
AttributesFont=Arial,8,N
AttributesFont color=0, 0, 0
OperationsFont=Arial,8,N
OperationsFont color=0, 0, 0
InnerClassifiersFont=Arial,8,N
InnerClassifiersFont color=0, 0, 0
LABLFont=Arial,8,N
LABLFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=4800
Height=3600
Brush color=208 208 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\OOMPORT]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Width=800
Height=800
Brush color=174 228 255
Fill Color=Yes
Brush style=6
Brush bitmap mode=12
Brush gradient mode=65
Brush gradient color=255 255 255
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDASSC]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
MULAFont=Arial,8,N
MULAFont color=0, 0, 0
Line style=1
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\INNERLINK]
Line style=1
Pen=1 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\CLDACLK]
Line style=1
Pen=2 0 0 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\GNRLLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\RLZSLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=3 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\RQLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=1 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\DEPDLINK]
DISPNAMEFont=Arial,8,N
DISPNAMEFont color=0, 0, 0
Line style=1
Pen=2 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\USRDEPD]
OBJXSTRFont=Arial,8,N
OBJXSTRFont color=0, 0, 0
Line style=1
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=2 0 128 128 255
Shadow color=192 192 192
Shadow=0

[DisplayPreferences\Symbol\Free Symbol]
Free TextFont=Arial,8,N
Free TextFont color=0, 0, 0
Line style=0
AutoAdjustToText=Yes
Keep aspect=No
Keep center=No
Keep size=No
Brush color=255 255 255
Fill Color=Yes
Brush style=1
Brush bitmap mode=12
Brush gradient mode=0
Brush gradient color=118 118 118
Brush background image=
Custom shape=
Custom text mode=0
Pen=1 0 0 0 255
Shadow color=192 192 192
Shadow=0</a:DisplayPreferences>
<a:PaperSize>(8268, 11693)</a:PaperSize>
<a:PageMargins>((315,354), (433,354))</a:PageMargins>
<a:PageOrientation>1</a:PageOrientation>
<a:PaperSource>15</a:PaperSource>
<c:Symbols>
<o:GeneralizationSymbol Id="o6">
<a:CreationDate>1565351887</a:CreationDate>
<a:ModificationDate>1565418003</a:ModificationDate>
<a:Rect>((-275,-25575), (725,-10925))</a:Rect>
<a:ListOfPoints>((225,-25575),(225,-10925))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o7"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o9"/>
</c:Object>
</o:GeneralizationSymbol>
<o:AssociationSymbol Id="o10">
<a:CreationDate>1565354161</a:CreationDate>
<a:ModificationDate>1565416057</a:ModificationDate>
<a:SourceTextOffset>(-212, 613)</a:SourceTextOffset>
<a:DestinationTextOffset>(1063, -213)</a:DestinationTextOffset>
<a:Rect>((2250,-7625), (13400,-1849))</a:Rect>
<a:ListOfPoints>((13400,-3050),(2250,-3050),(2250,-7625))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o11"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o12"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o13">
<a:CreationDate>1565415135</a:CreationDate>
<a:ModificationDate>1565457692</a:ModificationDate>
<a:Rect>((-32774,-5550), (2025,-224))</a:Rect>
<a:ListOfPoints>((-30750,-5550),(-30750,-225),(2025,-225))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o14"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o15"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o16"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o17">
<a:CreationDate>1565415674</a:CreationDate>
<a:ModificationDate>1565448577</a:ModificationDate>
<a:Rect>((-19450,2884), (-4200,5458))</a:Rect>
<a:ListOfPoints>((-4200,2884),(-4200,3684),(-19450,3684))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o15"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o18"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o19"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o20">
<a:CreationDate>1565416228</a:CreationDate>
<a:ModificationDate>1565417733</a:ModificationDate>
<a:Rect>((15951,-31757), (19849,-19125))</a:Rect>
<a:ListOfPoints>((17979,-31757),(17975,-19125))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o21"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o22"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o23"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o24">
<a:CreationDate>1565417911</a:CreationDate>
<a:ModificationDate>1565418008</a:ModificationDate>
<a:Rect>((-15436,-26925), (-11538,-15675))</a:Rect>
<a:ListOfPoints>((-13412,-26925),(-13412,-15675))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o25"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o26"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o27"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o28">
<a:CreationDate>1565417913</a:CreationDate>
<a:ModificationDate>1565418008</a:ModificationDate>
<a:Rect>((-11750,-27798), (-225,-25450))</a:Rect>
<a:ListOfPoints>((-11750,-26625),(-225,-26625))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o25"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o7"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o29"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o30">
<a:CreationDate>1565417916</a:CreationDate>
<a:ModificationDate>1565418008</a:ModificationDate>
<a:Rect>((-12499,-26550), (4725,-22699))</a:Rect>
<a:ListOfPoints>((-10475,-26550),(-10475,-22700),(4725,-22700))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o25"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o31"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o32"/>
</c:Object>
</o:AssociationSymbol>
<o:PolylineSymbol Id="o33">
<a:CreationDate>1565289583</a:CreationDate>
<a:ModificationDate>1565457710</a:ModificationDate>
<a:Rect>((-29154,-16875), (-23829,-16775))</a:Rect>
<a:ListOfPoints>((-23829,-16875),(-29154,-16875))</a:ListOfPoints>
<a:TextStyle>4130</a:TextStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16711680</a:LineColor>
<a:DashStyle>2</a:DashStyle>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontName>Arial,8,N</a:FontName>
</o:PolylineSymbol>
<o:GeneralizationSymbol Id="o34">
<a:CreationDate>1565266963</a:CreationDate>
<a:ModificationDate>1565416057</a:ModificationDate>
<a:Rect>((3825,-1581), (17647,11513))</a:Rect>
<a:ListOfPoints>((17647,-1581),(17647,11513),(3825,11513))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o11"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o35"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o36"/>
</c:Object>
</o:GeneralizationSymbol>
<o:GeneralizationSymbol Id="o37">
<a:CreationDate>1565266966</a:CreationDate>
<a:ModificationDate>1565448577</a:ModificationDate>
<a:Rect>((-21269,8018), (-3150,9018))</a:Rect>
<a:ListOfPoints>((-21269,8072),(-10000,8072),(-10000,8963),(-3150,8963))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o18"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o35"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o38"/>
</c:Object>
</o:GeneralizationSymbol>
<o:GeneralizationSymbol Id="o39">
<a:CreationDate>1565266968</a:CreationDate>
<a:ModificationDate>1565448569</a:ModificationDate>
<a:Rect>((-30625,14870), (-2475,15870))</a:Rect>
<a:ListOfPoints>((-30625,15370),(-2475,15370))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o40"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o35"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o41"/>
</c:Object>
</o:GeneralizationSymbol>
<o:AssociationSymbol Id="o42">
<a:CreationDate>1565269950</a:CreationDate>
<a:ModificationDate>1565269979</a:ModificationDate>
<a:Rect>((3375,14397), (15825,16745))</a:Rect>
<a:ListOfPoints>((15825,15571),(3375,15571))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o43"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o35"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o44"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o45">
<a:CreationDate>1565270481</a:CreationDate>
<a:ModificationDate>1565448577</a:ModificationDate>
<a:SourceTextOffset>(1012, 213)</a:SourceTextOffset>
<a:DestinationTextOffset>(-937, 187)</a:DestinationTextOffset>
<a:Rect>((-31987,9075), (-24864,14988))</a:Rect>
<a:ListOfPoints>((-31987,14988),(-31987,9475),(-24864,9475))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o40"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o18"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o46"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o47">
<a:CreationDate>1565271029</a:CreationDate>
<a:ModificationDate>1565457692</a:ModificationDate>
<a:SourceTextOffset>(-1012, 187)</a:SourceTextOffset>
<a:Rect>((-36999,-6212), (-25277,2632))</a:Rect>
<a:ListOfPoints>((-34975,-6212),(-34975,2632),(-25277,2632))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o14"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o18"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o48"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o49">
<a:CreationDate>1565275883</a:CreationDate>
<a:ModificationDate>1565417892</a:ModificationDate>
<a:SourceTextOffset>(-175, -587)</a:SourceTextOffset>
<a:DestinationTextOffset>(900, 213)</a:DestinationTextOffset>
<a:Rect>((-6263,-34223), (-3239,-20611))</a:Rect>
<a:ListOfPoints>((-5076,-34223),(-5076,-20611))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o50"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o51"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o52"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o53">
<a:CreationDate>1565289202</a:CreationDate>
<a:ModificationDate>1565503310</a:ModificationDate>
<a:Rect>((-25663,-22000), (-21915,6779))</a:Rect>
<a:ListOfPoints>((-23789,-22000),(-23789,6779))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o54"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o18"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o55"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o56">
<a:CreationDate>1565289494</a:CreationDate>
<a:ModificationDate>1565503292</a:ModificationDate>
<a:Rect>((-43774,-24150), (-38054,-7274))</a:Rect>
<a:ListOfPoints>((-38054,-7275),(-41900,-7275),(-41900,-24150))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o14"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o57"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o58"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o59">
<a:CreationDate>1565289500</a:CreationDate>
<a:ModificationDate>1565503310</a:ModificationDate>
<a:DestinationTextOffset>(-212, -587)</a:DestinationTextOffset>
<a:Rect>((-38733,-25110), (-25304,-22762))</a:Rect>
<a:ListOfPoints>((-38733,-23937),(-25304,-23937))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o57"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o54"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o60"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o61">
<a:CreationDate>1565290047</a:CreationDate>
<a:ModificationDate>1565503290</a:ModificationDate>
<a:SourceTextOffset>(-1388, -587)</a:SourceTextOffset>
<a:Rect>((-39404,-40498), (6672,-10575))</a:Rect>
<a:ListOfPoints>((-37004,-10575),(-37004,-39325),(6672,-39325))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o14"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o62"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o63"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o64">
<a:CreationDate>1565290052</a:CreationDate>
<a:ModificationDate>1565418532</a:ModificationDate>
<a:Rect>((11608,-39475), (29520,-11175))</a:Rect>
<a:ListOfPoints>((27496,-11175),(27496,-39475),(11608,-39475))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o65"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o62"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o66"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o67">
<a:CreationDate>1565330568</a:CreationDate>
<a:ModificationDate>1565457692</a:ModificationDate>
<a:Rect>((-30629,-9823), (-3554,-7475))</a:Rect>
<a:ListOfPoints>((-30629,-8650),(-3554,-8650))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o14"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o68"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o69">
<a:CreationDate>1565330571</a:CreationDate>
<a:ModificationDate>1565415196</a:ModificationDate>
<a:SourceTextOffset>(975, 213)</a:SourceTextOffset>
<a:DestinationTextOffset>(-900, -213)</a:DestinationTextOffset>
<a:Rect>((-2353,-7400), (1471,-1150))</a:Rect>
<a:ListOfPoints>((-516,-1150),(-516,-7400))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o15"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o70"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o71">
<a:CreationDate>1565330574</a:CreationDate>
<a:ModificationDate>1565418601</a:ModificationDate>
<a:Rect>((2071,-9123), (24271,-6750))</a:Rect>
<a:ListOfPoints>((2071,-7925),(11996,-7925),(11996,-7950),(24271,-7950))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o8"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o65"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o72"/>
</c:Object>
</o:AssociationSymbol>
<o:AssociationSymbol Id="o73">
<a:CreationDate>1565330580</a:CreationDate>
<a:ModificationDate>1565448577</a:ModificationDate>
<a:DestinationTextOffset>(-937, 613)</a:DestinationTextOffset>
<a:Rect>((-20933,-7250), (-2954,2971))</a:Rect>
<a:ListOfPoints>((-20933,2971),(-20933,-7250),(-2954,-7250))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>0</a:ArrowStyle>
<a:LineColor>16744448</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N
MULA 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o18"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Association Ref="o74"/>
</c:Object>
</o:AssociationSymbol>
<o:GeneralizationSymbol Id="o75">
<a:CreationDate>1565330752</a:CreationDate>
<a:ModificationDate>1565415177</a:ModificationDate>
<a:Rect>((-3765,-17444), (-2765,-11300))</a:Rect>
<a:ListOfPoints>((-3265,-17444),(-3265,-11300))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o51"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o76"/>
</c:Object>
</o:GeneralizationSymbol>
<o:GeneralizationSymbol Id="o77">
<a:CreationDate>1565330755</a:CreationDate>
<a:ModificationDate>1565417970</a:ModificationDate>
<a:Rect>((2343,-20765), (6740,-11000))</a:Rect>
<a:ListOfPoints>((6740,-20765),(6740,-14517),(2343,-14517),(2343,-11000))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o31"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o78"/>
</c:Object>
</o:GeneralizationSymbol>
<o:GeneralizationSymbol Id="o79">
<a:CreationDate>1565330759</a:CreationDate>
<a:ModificationDate>1565417733</a:ModificationDate>
<a:Rect>((2521,-17459), (16925,-10175))</a:Rect>
<a:ListOfPoints>((16925,-17459),(16925,-10175),(2521,-10175))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o22"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o80"/>
</c:Object>
</o:GeneralizationSymbol>
<o:GeneralizationSymbol Id="o81">
<a:CreationDate>1565330761</a:CreationDate>
<a:ModificationDate>1565417939</a:ModificationDate>
<a:Rect>((-11821,-15114), (-3029,-10400))</a:Rect>
<a:ListOfPoints>((-11821,-15114),(-11821,-10400),(-3029,-10400))</a:ListOfPoints>
<a:CornerStyle>1</a:CornerStyle>
<a:ArrowStyle>7</a:ArrowStyle>
<a:LineColor>16744576</a:LineColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>DISPNAME 0 Arial,8,N</a:FontList>
<c:SourceSymbol>
<o:ClassSymbol Ref="o26"/>
</c:SourceSymbol>
<c:DestinationSymbol>
<o:ClassSymbol Ref="o8"/>
</c:DestinationSymbol>
<c:Object>
<o:Generalization Ref="o82"/>
</c:Object>
</o:GeneralizationSymbol>
<o:ClassSymbol Id="o35">
<a:CreationDate>1565266746</a:CreationDate>
<a:ModificationDate>1565269797</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-4814,7881), (4814,18519))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o83"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o18">
<a:CreationDate>1565266772</a:CreationDate>
<a:ModificationDate>1565448577</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-28414,1980), (-18786,10670))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o84"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o11">
<a:CreationDate>1565266798</a:CreationDate>
<a:ModificationDate>1565416057</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((13365,-5797), (21835,-1003))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o85"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o40">
<a:CreationDate>1565266857</a:CreationDate>
<a:ModificationDate>1565448569</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-34597,14890), (-27903,18711))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o86"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o65">
<a:CreationDate>1565266913</a:CreationDate>
<a:ModificationDate>1565416047</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((20388,-11347), (29012,-6553))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o87"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o14">
<a:CreationDate>1565266934</a:CreationDate>
<a:ModificationDate>1565457692</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-38830,-10609), (-29820,-4841))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o88"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o15">
<a:CreationDate>1565269378</a:CreationDate>
<a:ModificationDate>1565415196</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-4680,-2684), (4330,3084))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o89"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o43">
<a:CreationDate>1565269506</a:CreationDate>
<a:ModificationDate>1565269979</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((13986,13503), (22764,18297))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o90"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o22">
<a:CreationDate>1565269670</a:CreationDate>
<a:ModificationDate>1565417733</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((15526,-20760), (20924,-16940))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o91"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o25">
<a:CreationDate>1565272096</a:CreationDate>
<a:ModificationDate>1565418008</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-16297,-30647), (-9603,-25853))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o92"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o26">
<a:CreationDate>1565272765</a:CreationDate>
<a:ModificationDate>1565417939</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-15849,-18060), (-11049,-14240))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o93"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o31">
<a:CreationDate>1565274445</a:CreationDate>
<a:ModificationDate>1565417970</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((3186,-24347), (14514,-20527))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o94"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o51">
<a:CreationDate>1565275123</a:CreationDate>
<a:ModificationDate>1565415177</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-7387,-20997), (-2513,-17177))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o95"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o50">
<a:CreationDate>1565275805</a:CreationDate>
<a:ModificationDate>1565417892</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-9446,-36971), (-1054,-31203))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o96"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o97">
<a:CreationDate>1565288766</a:CreationDate>
<a:ModificationDate>1565457719</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-36399,-19384), (-29051,-14590))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o98"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o54">
<a:CreationDate>1565288783</a:CreationDate>
<a:ModificationDate>1565503310</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-25768,-25559), (-16682,-20765))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o99"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o57">
<a:CreationDate>1565288814</a:CreationDate>
<a:ModificationDate>1565503292</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-45436,-26209), (-37264,-21415))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o100"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o62">
<a:CreationDate>1565290024</a:CreationDate>
<a:ModificationDate>1565418532</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((4252,-42994), (11640,-33330))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o101"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o8">
<a:CreationDate>1565330253</a:CreationDate>
<a:ModificationDate>1565415156</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-4712,-11709), (3604,-6915))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o102"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o7">
<a:CreationDate>1565351401</a:CreationDate>
<a:ModificationDate>1565418003</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((-2014,-30659), (5916,-24891))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o103"/>
</c:Object>
</o:ClassSymbol>
<o:ClassSymbol Id="o21">
<a:CreationDate>1565416175</a:CreationDate>
<a:ModificationDate>1565416455</a:ModificationDate>
<a:IconMode>-1</a:IconMode>
<a:Rect>((14449,-35046), (22301,-29278))</a:Rect>
<a:LineColor>16744448</a:LineColor>
<a:FillColor>16770222</a:FillColor>
<a:ShadowColor>12632256</a:ShadowColor>
<a:FontList>STRN 0 Arial,8,N
DISPNAME 0 Arial,8,N
CNTR 0 Arial,8,N
Attributes 0 Arial,8,N
ClassPrimaryAttribute 0 Arial,8,U
Operations 0 Arial,8,N
InnerClassifiers 0 Arial,8,N
LABL 0 Arial,8,N</a:FontList>
<a:BrushStyle>6</a:BrushStyle>
<a:GradientFillMode>65</a:GradientFillMode>
<a:GradientEndColor>16777215</a:GradientEndColor>
<c:Object>
<o:Class Ref="o104"/>
</c:Object>
</o:ClassSymbol>
</c:Symbols>
</o:ClassDiagram>
</c:ClassDiagrams>
<c:DefaultDiagram>
<o:ClassDiagram Ref="o5"/>
</c:DefaultDiagram>
<c:Classes>
<o:Class Id="o83">
<a:ObjectID>ABA6B553-EA31-42B9-9899-074CF70345F5</a:ObjectID>
<a:Name>Personne</a:Name>
<a:Code>Personne</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565293536</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o105">
<a:ObjectID>0D0AE127-B498-4890-BF43-53FE0A938804</a:ObjectID>
<a:Name>id_pers</a:Name>
<a:Code>idPers</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266746</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o106">
<a:ObjectID>91D8CE8D-7BAA-43A0-A90C-0CF30BB86791</a:ObjectID>
<a:Name>nom_pers</a:Name>
<a:Code>nomPers</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266746</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o107">
<a:ObjectID>2C1B68CF-ADA6-44DB-87AC-E71668D0BC91</a:ObjectID>
<a:Name>prenom_pers</a:Name>
<a:Code>prenomPers</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266746</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o108">
<a:ObjectID>5A245F53-9100-4740-9B27-298D515B35BF</a:ObjectID>
<a:Name>sexe_pers</a:Name>
<a:Code>sexePers</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266746</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o109">
<a:ObjectID>54D7C4D6-ACAE-4FB3-ACF3-575FDF1C9F75</a:ObjectID>
<a:Name>adresse_pers</a:Name>
<a:Code>adressePers</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266746</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o110">
<a:ObjectID>E6291C72-EC77-4750-ADF9-6EE53CABEADB</a:ObjectID>
<a:Name>tel_pers</a:Name>
<a:Code>telPers</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266746</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o111">
<a:ObjectID>0367F7FF-3F86-498E-97FF-DD68BDB0E21E</a:ObjectID>
<a:Name>password</a:Name>
<a:Code>password</a:Code>
<a:CreationDate>1565266746</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266746</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o112">
<a:ObjectID>C15FD86B-5F33-4306-9CDB-E88196DDE6B3</a:ObjectID>
<a:Name>email</a:Name>
<a:Code>email</a:Code>
<a:CreationDate>1565269798</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269819</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o84">
<a:ObjectID>32571ACA-28E2-4E6F-9217-F75B7CDC8D93</a:ObjectID>
<a:Name>Candidat</a:Name>
<a:Code>Candidat</a:Code>
<a:CreationDate>1565266772</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565458747</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o113">
<a:ObjectID>3ABC4F19-57B7-4EE3-A824-EF281F095E17</a:ObjectID>
<a:Name>date_nais</a:Name>
<a:Code>dateNais</a:Code>
<a:CreationDate>1565266772</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266772</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o114">
<a:ObjectID>D3DCAAB7-7B62-4F50-A763-85F5913FD7D5</a:ObjectID>
<a:Name>lieu_nais</a:Name>
<a:Code>lieuNais</a:Code>
<a:CreationDate>1565266772</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266772</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o115">
<a:ObjectID>5D423C2A-944F-4BF9-A8A9-C509A7F52A9D</a:ObjectID>
<a:Name>diplome</a:Name>
<a:Code>diplome</a:Code>
<a:CreationDate>1565448433</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565448553</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o116">
<a:ObjectID>8F968B0C-B886-41B8-A419-029CC48427A5</a:ObjectID>
<a:Name>serie</a:Name>
<a:Code>serie</a:Code>
<a:CreationDate>1565448433</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565448553</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o117">
<a:ObjectID>9A19F14A-A5C8-446A-9399-9BB357440C42</a:ObjectID>
<a:Name>niv_etu_univ</a:Name>
<a:Code>nivEtuUniv</a:Code>
<a:CreationDate>1565448433</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565448553</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o118">
<a:ObjectID>E395DCE9-9032-4E74-9616-9E3EA0BFB269</a:ObjectID>
<a:Name>statut</a:Name>
<a:Code>statut</a:Code>
<a:CreationDate>1565448433</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565448553</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o85">
<a:ObjectID>E08F83C8-6F44-487C-8E4F-88B1C161E736</a:ObjectID>
<a:Name>Agent</a:Name>
<a:Code>Agent</a:Code>
<a:CreationDate>1565266798</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565354259</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o119">
<a:ObjectID>8C734735-856E-4DF6-99FC-097BCC188E73</a:ObjectID>
<a:Name>date_nais</a:Name>
<a:Code>dateNais</a:Code>
<a:CreationDate>1565266798</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266798</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o120">
<a:ObjectID>64FD4CA3-9841-4D42-AB40-BDEA0DAAB658</a:ObjectID>
<a:Name>lieu_nais</a:Name>
<a:Code>lieuNais</a:Code>
<a:CreationDate>1565266798</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266798</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o86">
<a:ObjectID>613E6CF3-A622-4D7F-AE47-465124578278</a:ObjectID>
<a:Name>Tuteur</a:Name>
<a:Code>Tuteur</a:Code>
<a:CreationDate>1565266857</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565270536</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o121">
<a:ObjectID>90D66FC5-6584-46F5-B08D-EFA69123D4EB</a:ObjectID>
<a:Name>prof_par</a:Name>
<a:Code>profPar</a:Code>
<a:CreationDate>1565266857</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266857</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o87">
<a:ObjectID>9713D167-7799-4AA7-AACE-CAD24EA0ECDE</a:ObjectID>
<a:Name>Annee Academique</a:Name>
<a:Code>AnneeAcademique</a:Code>
<a:CreationDate>1565266913</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330695</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o122">
<a:ObjectID>C412419A-3CE3-4F81-9D86-D722A555B634</a:ObjectID>
<a:Name>id_annee</a:Name>
<a:Code>idAnnee</a:Code>
<a:CreationDate>1565266913</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266913</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o123">
<a:ObjectID>BB648539-71EB-4026-A019-8D9ED1A7BD97</a:ObjectID>
<a:Name>lib_annee</a:Name>
<a:Code>libAnnee</a:Code>
<a:CreationDate>1565266913</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266913</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o124">
<a:ObjectID>E164898B-B45A-4EC7-854D-70AE585EF3D5</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565266913</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266913</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o122"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o125">
<a:ObjectID>01AAD68E-437F-4DE3-92B2-0C8B15F9684D</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565266913</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266913</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o122"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o126">
<a:ObjectID>87553D9C-8136-4311-89E3-7722B448BAD9</a:ObjectID>
<a:Name>Identifiant_3</a:Name>
<a:Code>Identifiant_3</a:Code>
<a:CreationDate>1565266913</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266913</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o122"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o126"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o88">
<a:ObjectID>FDACA292-94ED-4F12-B1D6-D006626B3E2A</a:ObjectID>
<a:Name>Filere</a:Name>
<a:Code>Filere</a:Code>
<a:CreationDate>1565266934</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565415246</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o127">
<a:ObjectID>EF3D1D87-8700-4E73-AA39-0BBCAF5CC6C0</a:ObjectID>
<a:Name>id_classe</a:Name>
<a:Code>idClasse</a:Code>
<a:CreationDate>1565266934</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266934</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o128">
<a:ObjectID>3FB3B23C-3A6A-4186-BF5B-A263BEFB8F58</a:ObjectID>
<a:Name>lib_filiere</a:Name>
<a:Code>libFiliere</a:Code>
<a:CreationDate>1565266934</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266934</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o129">
<a:ObjectID>EE4A6F3F-3E5E-4678-81E8-1391C28A3491</a:ObjectID>
<a:Name>abreviation</a:Name>
<a:Code>abreviation</a:Code>
<a:CreationDate>1565266934</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266934</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o130">
<a:ObjectID>D567C530-3BE5-45BD-8A8F-1BA5F615E0E1</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565266934</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266934</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o127"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o131">
<a:ObjectID>C6C0826A-916B-4FE0-B693-0F53D4787D0A</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565266934</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266934</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o127"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o131"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o89">
<a:ObjectID>FF419591-31D4-4C4E-A7DC-7306801516E1</a:ObjectID>
<a:Name>Niveau Etude</a:Name>
<a:Code>NiveauEtude</a:Code>
<a:CreationDate>1565269378</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565415691</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o132">
<a:ObjectID>03B6C92B-4538-45C8-82D4-830D2B260309</a:ObjectID>
<a:Name>id_niveau</a:Name>
<a:Code>idNiveau</a:Code>
<a:CreationDate>1565269378</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269412</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o133">
<a:ObjectID>750963D9-7C72-4215-95A8-B1AAF4C37151</a:ObjectID>
<a:Name>lib_niveau</a:Name>
<a:Code>libNiveau</a:Code>
<a:CreationDate>1565269378</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269412</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o134">
<a:ObjectID>DDB443CF-456F-40D0-9A25-4A8CD272F13B</a:ObjectID>
<a:Name>abreviation</a:Name>
<a:Code>abreviation</a:Code>
<a:CreationDate>1565269378</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269378</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o135">
<a:ObjectID>F495C691-503C-4515-86F8-FE53D486AF8D</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565269378</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269378</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o132"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o136">
<a:ObjectID>C79DF555-AAEB-47F6-99CC-D9DE526E80A4</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565269378</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269378</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o132"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o136"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o90">
<a:ObjectID>60A56266-4D68-45E9-B183-E4A824483C4A</a:ObjectID>
<a:Name>Pays</a:Name>
<a:Code>Pays</a:Code>
<a:CreationDate>1565269506</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565270042</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o137">
<a:ObjectID>37A54615-D1A5-4404-8DEF-D38A30DB6B08</a:ObjectID>
<a:Name>code_pays</a:Name>
<a:Code>codePays</a:Code>
<a:CreationDate>1565269506</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269551</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o138">
<a:ObjectID>2EAEEC77-1E1F-4AC4-AA01-EF0B4D9B3807</a:ObjectID>
<a:Name>lib_pays</a:Name>
<a:Code>libPays</a:Code>
<a:CreationDate>1565269506</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269551</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o139">
<a:ObjectID>1D2C785E-5CE7-4D4A-B1EA-C3213C75B06E</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565269506</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269506</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o137"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o140">
<a:ObjectID>45266737-E32E-41E5-AC54-0F2AD89C8CE9</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565269506</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565269506</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o137"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o140"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o91">
<a:ObjectID>BAD8B06D-8656-412E-914F-08A51D8F7489</a:ObjectID>
<a:Name>Preinscription</a:Name>
<a:Code>Preinscription</a:Code>
<a:CreationDate>1565269670</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565416334</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Identifiers>
<o:Identifier Id="o141">
<a:ObjectID>1BA80094-383C-4B20-B616-DF2AD2AC1986</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565269670</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351299</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
<o:Identifier Id="o142">
<a:ObjectID>61A6FB07-51D2-4095-B6AF-72D61FA6A3F6</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565269670</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351299</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o142"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o92">
<a:ObjectID>E7FD87B0-F2F4-4668-B70C-733A3FEDC3DF</a:ObjectID>
<a:Name>Frais</a:Name>
<a:Code>Frais</a:Code>
<a:CreationDate>1565272096</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565418033</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o143">
<a:ObjectID>0BB039BA-9BFB-4FAC-A95A-423ECA7750D5</a:ObjectID>
<a:Name>id_frais</a:Name>
<a:Code>idFrais</a:Code>
<a:CreationDate>1565272096</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565272177</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o144">
<a:ObjectID>D2F2D5BA-9485-40E2-A98C-DF913F7A3F47</a:ObjectID>
<a:Name>montant</a:Name>
<a:Code>montant</a:Code>
<a:CreationDate>1565272096</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565272177</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o145">
<a:ObjectID>1BF07BDA-D290-4E5A-88DE-389C72F86712</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565272096</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565272096</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o143"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o146">
<a:ObjectID>48276762-5F70-4DDE-B220-D290427CCD67</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565272096</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565272096</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o143"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o146"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o93">
<a:ObjectID>9C2144ED-12CB-4AFC-9DF7-64B4A56140FF</a:ObjectID>
<a:Name>Scolarite</a:Name>
<a:Code>Scolarite</a:Code>
<a:CreationDate>1565272765</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565417954</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Identifiers>
<o:Identifier Id="o147">
<a:ObjectID>3EAEB8CB-E474-4848-9B64-CB382B9A6206</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565272765</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351258</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
<o:Identifier Id="o148">
<a:ObjectID>4387B680-0C4F-4EF7-904F-32E25665443C</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565272765</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351258</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o148"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o94">
<a:ObjectID>0186F1F0-A310-4655-A418-D5356AAECFE0</a:ObjectID>
<a:Name>Duplicata</a:Name>
<a:Code>Duplicata</a:Code>
<a:CreationDate>1565274445</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565417989</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o149">
<a:ObjectID>75FA7034-0D07-44DD-BF6A-0F1FA9159E84</a:ObjectID>
<a:Name>nature_document</a:Name>
<a:Code>natureDocument</a:Code>
<a:CreationDate>1565415924</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565415946</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o150">
<a:ObjectID>E46FE4A6-9978-4873-880F-6908FC9E9B09</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565274445</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351273</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
<o:Identifier Id="o151">
<a:ObjectID>1C78AA61-A8C3-4BA6-B530-9B7CF722C59D</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565274445</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351273</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o151"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o95">
<a:ObjectID>D20F2315-5208-417A-BB5E-72A06C1F8711</a:ObjectID>
<a:Name>Soutenance</a:Name>
<a:Code>Soutenance</a:Code>
<a:CreationDate>1565275123</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351316</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Identifiers>
<o:Identifier Id="o152">
<a:ObjectID>F622C568-F842-4CF3-A593-4EA798607F99</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565275123</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351316</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
<o:Identifier Id="o153">
<a:ObjectID>0A90CEEF-D1D8-4FC6-9688-61A9C9C38918</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565275123</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351316</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o153"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o96">
<a:ObjectID>45E4FB5E-3E92-4AFC-8BBC-877CCB87600C</a:ObjectID>
<a:Name>Cycle</a:Name>
<a:Code>Cycle</a:Code>
<a:CreationDate>1565275805</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565417323</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o154">
<a:ObjectID>62928D2B-7755-4A46-B8C3-265D7FAB5D00</a:ObjectID>
<a:Name>id_cycle</a:Name>
<a:Code>idCycle</a:Code>
<a:CreationDate>1565275805</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565275872</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o155">
<a:ObjectID>D56516CE-DC4C-47F1-86C0-478366091316</a:ObjectID>
<a:Name>lib_clycle</a:Name>
<a:Code>libClycle</a:Code>
<a:CreationDate>1565275805</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565275872</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o156">
<a:ObjectID>514AB185-0319-4635-94AA-C79B7FB627CE</a:ObjectID>
<a:Name>frais</a:Name>
<a:Code>frais</a:Code>
<a:CreationDate>1565417313</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565417323</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o157">
<a:ObjectID>2D87E9DB-7728-4FEB-A57A-C342C909FE1F</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565275805</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565275805</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o154"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o158">
<a:ObjectID>2194BC60-4CD9-493D-AE2F-677D36767699</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565275805</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565275805</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o154"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o158"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o98">
<a:ObjectID>3B5059D8-C965-438C-83EF-1CFE32A4E8FC</a:ObjectID>
<a:Name>ComposerConcours</a:Name>
<a:Code>ComposerConcours</a:Code>
<a:CreationDate>1565288766</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565503265</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o159">
<a:ObjectID>A55C8769-E2F5-4EA1-B65F-9734B975D7AB</a:ObjectID>
<a:Name>id_comp</a:Name>
<a:Code>idComp</a:Code>
<a:CreationDate>1565288766</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288766</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o160">
<a:ObjectID>C4D6DE74-E0FA-4148-90C5-E3C99CF54F08</a:ObjectID>
<a:Name>note</a:Name>
<a:Code>note</a:Code>
<a:CreationDate>1565288766</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288766</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o161">
<a:ObjectID>9611B6AD-982C-4C7F-917F-E5780D766FE4</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565288766</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288766</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o159"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o162">
<a:ObjectID>CDF1C438-0CF0-4A24-8C1C-50046AEF8DD9</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565288766</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288766</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o159"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o162"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o99">
<a:ObjectID>9859AF84-3E87-44B1-AF1B-88C3814961FE</a:ObjectID>
<a:Name>MatiereConcours</a:Name>
<a:Code>MatiereConcours</a:Code>
<a:CreationDate>1565288783</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565503322</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o163">
<a:ObjectID>F50CD3F4-7565-4BA2-A77D-B7FC981A3E82</a:ObjectID>
<a:Name>id_matiere</a:Name>
<a:Code>idMatiere</a:Code>
<a:CreationDate>1565288783</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288783</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o164">
<a:ObjectID>02354F89-E787-4AFB-866A-8F46F1EFECDE</a:ObjectID>
<a:Name>lib_matiere</a:Name>
<a:Code>libMatiere</a:Code>
<a:CreationDate>1565288783</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288783</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o165">
<a:ObjectID>FDDDC76F-6887-4460-92C4-EE64775F46A3</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565288783</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288783</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o163"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o166">
<a:ObjectID>AD66EADF-325A-473B-A07C-0E73E14CA8DF</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565288783</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288783</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o163"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o166"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o100">
<a:ObjectID>C3969916-4C89-485E-8EEF-82F49760D5FA</a:ObjectID>
<a:Name>ProgrammerConcours</a:Name>
<a:Code>ProgrammerConcours</a:Code>
<a:CreationDate>1565288814</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565503280</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<a:Final>1</a:Final>
<c:Attributes>
<o:Attribute Id="o167">
<a:ObjectID>73616712-E271-4644-BA7F-C309831B1F88</a:ObjectID>
<a:Name>id_pro</a:Name>
<a:Code>idPro</a:Code>
<a:CreationDate>1565288814</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288814</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o168">
<a:ObjectID>FC66FA7B-50D8-4AC1-B451-D0344DB8F478</a:ObjectID>
<a:Name>coef</a:Name>
<a:Code>coef</a:Code>
<a:CreationDate>1565288814</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288814</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o169">
<a:ObjectID>E90DD89F-5A49-4F06-8F2A-74AD4C1FB12B</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565288814</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288814</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o167"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o170">
<a:ObjectID>BDA95923-D21F-4B1B-80F9-3AF60830FF9B</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565288814</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565288814</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o167"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o170"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o101">
<a:ObjectID>16D864C7-3590-4584-BDE5-EE69023D168D</a:ObjectID>
<a:Name>Emploi temps</a:Name>
<a:Code>EmploiTemps</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290261</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o171">
<a:ObjectID>0E8AA429-DCF1-41F9-935F-5F3F3292B277</a:ObjectID>
<a:Name>id_emploi</a:Name>
<a:Code>idEmploi</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290024</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o172">
<a:ObjectID>A9DC9DD2-D39D-4F0C-BFF3-212F04D03101</a:ObjectID>
<a:Name>lundi</a:Name>
<a:Code>lundi</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290382</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o173">
<a:ObjectID>231A013B-A987-43C3-9F55-6DD7AB6FFFD6</a:ObjectID>
<a:Name>mardi</a:Name>
<a:Code>mardi</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290382</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o174">
<a:ObjectID>955F2B54-C9CE-4D03-B2CA-797D1AB2F20C</a:ObjectID>
<a:Name>mercredi</a:Name>
<a:Code>mercredi</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290382</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o175">
<a:ObjectID>3C8A1607-37AF-4D21-B6BD-B141BAD32897</a:ObjectID>
<a:Name>jeudi</a:Name>
<a:Code>jeudi</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290382</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o176">
<a:ObjectID>97211DAD-1EB8-4F97-B150-6F32702BBC31</a:ObjectID>
<a:Name>vendredi</a:Name>
<a:Code>vendredi</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290382</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o177">
<a:ObjectID>A0A74EA7-7EFF-4D3E-A5D4-CE448A692BAD</a:ObjectID>
<a:Name>samedi</a:Name>
<a:Code>samedi</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290382</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o178">
<a:ObjectID>84FF1472-3A1B-4AE4-AE48-96A754B26D5C</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290024</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o171"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o179">
<a:ObjectID>796DB494-7CD8-40D5-9FB0-192E2B77DBF3</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565290024</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290024</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o171"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o179"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o102">
<a:ObjectID>678BC9E3-8585-41A8-93DC-63716F7ACBF9</a:ObjectID>
<a:Name>Payement</a:Name>
<a:Code>Payement</a:Code>
<a:CreationDate>1565330253</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565354259</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o180">
<a:ObjectID>B9B02B56-4EF2-4A12-BD6A-305E152C73A3</a:ObjectID>
<a:Name>id_paye</a:Name>
<a:Code>idPaye</a:Code>
<a:CreationDate>1565330253</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330542</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o181">
<a:ObjectID>F6C2EA50-0380-44E2-9611-216F280EC018</a:ObjectID>
<a:Name>date_paye</a:Name>
<a:Code>datePaye</a:Code>
<a:CreationDate>1565330253</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330542</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>Date</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o182">
<a:ObjectID>4E05A767-C5D8-4ACB-A5B0-BE8364606F95</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565330253</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330253</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o180"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o183">
<a:ObjectID>60B340B1-184B-496C-ABC1-597FC8D0424D</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565330253</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330253</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o180"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o183"/>
</c:PrimaryIdentifier>
</o:Class>
<o:Class Id="o103">
<a:ObjectID>7DBC6F65-9374-40E9-85B7-076B1A4C8686</a:ObjectID>
<a:Name>Cursus</a:Name>
<a:Code>Cursus</a:Code>
<a:CreationDate>1565351401</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565418033</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o184">
<a:ObjectID>E7727E4A-A6C2-4C98-A33E-AFD247CB7900</a:ObjectID>
<a:Name>resultat</a:Name>
<a:Code>resultat</a:Code>
<a:CreationDate>1565351405</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351846</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o185">
<a:ObjectID>AAFEC815-ECBB-461F-AB2F-224C6C2E1394</a:ObjectID>
<a:Name>diplome</a:Name>
<a:Code>diplome</a:Code>
<a:CreationDate>1565351405</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351846</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o186">
<a:ObjectID>5332FAAF-4B60-45DE-AA70-EFD89CF8758D</a:ObjectID>
<a:Name>statut</a:Name>
<a:Code>statut</a:Code>
<a:CreationDate>1565351405</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351846</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
</o:Class>
<o:Class Id="o104">
<a:ObjectID>FCBB8922-A165-4514-A2C4-72E89EF6E3BD</a:ObjectID>
<a:Name>TypeFormation</a:Name>
<a:Code>TypeFormation</a:Code>
<a:CreationDate>1565416175</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565416385</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:UseParentNamespace>0</a:UseParentNamespace>
<c:Attributes>
<o:Attribute Id="o187">
<a:ObjectID>7CF850F1-8C7F-4168-AA85-A99DBB5294F5</a:ObjectID>
<a:Name>id_type</a:Name>
<a:Code>idType</a:Code>
<a:CreationDate>1565416175</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565417768</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
<a:Multiplicity>1..1</a:Multiplicity>
</o:Attribute>
<o:Attribute Id="o188">
<a:ObjectID>C0092E6A-8017-47AC-A1EC-8F8FFB5F065B</a:ObjectID>
<a:Name>lib_type</a:Name>
<a:Code>libType</a:Code>
<a:CreationDate>1565416175</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565416385</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>String</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
<o:Attribute Id="o189">
<a:ObjectID>A42738F2-F1E7-4939-BC8B-DB42FC87B29D</a:ObjectID>
<a:Name>frais</a:Name>
<a:Code>frais</a:Code>
<a:CreationDate>1565416347</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565416385</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:DataType>int</a:DataType>
<a:Attribute.Visibility>-</a:Attribute.Visibility>
</o:Attribute>
</c:Attributes>
<c:Identifiers>
<o:Identifier Id="o190">
<a:ObjectID>380797FD-FD22-4DBB-B3CC-62294876A628</a:ObjectID>
<a:Name>Identifiant_1</a:Name>
<a:Code>Identifiant_1</a:Code>
<a:CreationDate>1565416175</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565416175</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o187"/>
</c:Identifier.Attributes>
</o:Identifier>
<o:Identifier Id="o191">
<a:ObjectID>0E87DCB6-DEFD-42EF-8A28-FAF704E5920F</a:ObjectID>
<a:Name>Identifiant_2</a:Name>
<a:Code>Identifiant_2</a:Code>
<a:CreationDate>1565416175</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565416175</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Identifier.Attributes>
<o:Attribute Ref="o187"/>
</c:Identifier.Attributes>
</o:Identifier>
</c:Identifiers>
<c:PrimaryIdentifier>
<o:Identifier Ref="o191"/>
</c:PrimaryIdentifier>
</o:Class>
</c:Classes>
<c:Associations>
<o:Association Id="o44">
<a:ObjectID>F0811BA9-B71F-4741-9610-38212EDBBE49</a:ObjectID>
<a:Name>Apartenir</a:Name>
<a:Code>apartenir</a:Code>
<a:CreationDate>1565269950</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565270042</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o83"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o90"/>
</c:Object2>
</o:Association>
<o:Association Id="o46">
<a:ObjectID>D4453D98-D13C-4EC0-A71F-4FA543B405D0</a:ObjectID>
<a:Name>Association_6</a:Name>
<a:Code>association6</a:Code>
<a:CreationDate>1565270481</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565270536</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o84"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o86"/>
</c:Object2>
</o:Association>
<o:Association Id="o48">
<a:ObjectID>EE4D2543-DA3F-4FE6-9BAF-C49BC00E5DEE</a:ObjectID>
<a:Name>Association_7</a:Name>
<a:Code>association7</a:Code>
<a:CreationDate>1565271029</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565271066</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o84"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o88"/>
</c:Object2>
</o:Association>
<o:Association Id="o52">
<a:ObjectID>FC0229CD-B5B5-40F1-AE7C-86A96F504F7A</a:ObjectID>
<a:Name>Association_23</a:Name>
<a:Code>association23</a:Code>
<a:CreationDate>1565275883</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565275912</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o95"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o96"/>
</c:Object2>
</o:Association>
<o:Association Id="o55">
<a:ObjectID>620CBD14-CA13-4CF3-856D-B9FF3231B0AD</a:ObjectID>
<a:Name>Association_25</a:Name>
<a:Code>association25</a:Code>
<a:CreationDate>1565289203</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565289224</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..*</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o84"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o99"/>
</c:Object2>
</o:Association>
<o:Association Id="o58">
<a:ObjectID>C6C564AC-2204-44EA-9E6F-4CF6BF9D8DEF</a:ObjectID>
<a:Name>Association_26</a:Name>
<a:Code>association26</a:Code>
<a:CreationDate>1565289494</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565289558</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o100"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o88"/>
</c:Object2>
</o:Association>
<o:Association Id="o60">
<a:ObjectID>60747336-CAEE-4B23-A735-618DC3D6FC66</a:ObjectID>
<a:Name>Association_27</a:Name>
<a:Code>association27</a:Code>
<a:CreationDate>1565289500</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565289531</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..*</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..1</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,276={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,6=&lt;None&gt;
{78C31404-0EE5-4FD0-9038-EE396B305F05},roleBContainer,6=&lt;None&gt;

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o99"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o100"/>
</c:Object2>
</o:Association>
<o:Association Id="o63">
<a:ObjectID>E98B18AF-C208-44E8-830B-85ED3BD96237</a:ObjectID>
<a:Name>Association_28</a:Name>
<a:Code>association28</a:Code>
<a:CreationDate>1565290048</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290204</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>0..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o101"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o88"/>
</c:Object2>
</o:Association>
<o:Association Id="o66">
<a:ObjectID>00F35D86-92BD-416A-A2E7-F39392E0E938</a:ObjectID>
<a:Name>Association_29</a:Name>
<a:Code>association29</a:Code>
<a:CreationDate>1565290052</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565290261</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o101"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o87"/>
</c:Object2>
</o:Association>
<o:Association Id="o68">
<a:ObjectID>1FFB50D6-82FB-461F-B609-D9D6832D76C5</a:ObjectID>
<a:Name>Association_11</a:Name>
<a:Code>association11</a:Code>
<a:CreationDate>1565330568</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330611</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o88"/>
</c:Object2>
</o:Association>
<o:Association Id="o70">
<a:ObjectID>D49B1FA0-5878-4A04-AF10-679D4C749877</a:ObjectID>
<a:Name>Association_12</a:Name>
<a:Code>association12</a:Code>
<a:CreationDate>1565330571</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330674</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o89"/>
</c:Object2>
</o:Association>
<o:Association Id="o72">
<a:ObjectID>1FAB37F1-2426-45E6-9ED2-6C734CFB68F4</a:ObjectID>
<a:Name>Association_13</a:Name>
<a:Code>association13</a:Code>
<a:CreationDate>1565330574</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330695</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..*</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..1</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,276={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,6=&lt;None&gt;
{78C31404-0EE5-4FD0-9038-EE396B305F05},roleBContainer,6=&lt;None&gt;

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o87"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o102"/>
</c:Object2>
</o:Association>
<o:Association Id="o74">
<a:ObjectID>90F8F446-725F-4C45-A1D5-39C0501F2E41</a:ObjectID>
<a:Name>Association_14</a:Name>
<a:Code>association14</a:Code>
<a:CreationDate>1565330580</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330642</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o84"/>
</c:Object2>
</o:Association>
<o:Association Id="o12">
<a:ObjectID>078EFEF0-3B72-4D57-A025-418FAC9D2FA3</a:ObjectID>
<a:Name>Association_15</a:Name>
<a:Code>association15</a:Code>
<a:CreationDate>1565354161</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565354259</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o85"/>
</c:Object2>
</o:Association>
<o:Association Id="o16">
<a:ObjectID>FC8947E1-4F2E-4DCE-945D-7D5D0D26DBCA</a:ObjectID>
<a:Name>Association_16</a:Name>
<a:Code>association16</a:Code>
<a:CreationDate>1565415135</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565415246</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o89"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o88"/>
</c:Object2>
</o:Association>
<o:Association Id="o19">
<a:ObjectID>F5DB6C00-ABC4-46E1-A201-AE3C1F58D610</a:ObjectID>
<a:Name>Association_17</a:Name>
<a:Code>association17</a:Code>
<a:CreationDate>1565415674</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565415691</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o84"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o89"/>
</c:Object2>
</o:Association>
<o:Association Id="o23">
<a:ObjectID>99023738-661A-4644-B7E7-1DCE06C0F6E3</a:ObjectID>
<a:Name>TypeFormation</a:Name>
<a:Code>typeFormation</a:Code>
<a:CreationDate>1565416228</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565416334</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o91"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o104"/>
</c:Object2>
</o:Association>
<o:Association Id="o27">
<a:ObjectID>B82565C9-668D-44A9-BF67-C515E9DD1638</a:ObjectID>
<a:Name>Association_19</a:Name>
<a:Code>association19</a:Code>
<a:CreationDate>1565417911</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565417954</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o93"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o92"/>
</c:Object2>
</o:Association>
<o:Association Id="o29">
<a:ObjectID>7326C2E8-5F46-43B5-A61B-7205CF3D82C0</a:ObjectID>
<a:Name>Association_20</a:Name>
<a:Code>association20</a:Code>
<a:CreationDate>1565417913</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565418033</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o103"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o92"/>
</c:Object2>
</o:Association>
<o:Association Id="o32">
<a:ObjectID>F71D0858-9751-491F-8A18-8721763F4627</a:ObjectID>
<a:Name>Association_21</a:Name>
<a:Code>association21</a:Code>
<a:CreationDate>1565417916</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565417989</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:RoleAMultiplicity>1..1</a:RoleAMultiplicity>
<a:RoleBMultiplicity>1..*</a:RoleBMultiplicity>
<a:RoleBNavigability>0</a:RoleBNavigability>
<a:ExtendedAttributesText>{0DEDDB90-46E2-45A0-886E-411709DA0DC9},Java,224={72FA5C48-5524-4DF7-8187-ABB19AB5AF9E},roleAContainer,6=&lt;None&gt;
{F6FFC71C-C472-4261-A710-B0BCC0BF4D58},roleAImplementationClass,6=&lt;None&gt;
{C11C9F66-6453-43A2-8824-6654518CF65A},roleBImplementationClass,17=java.util.HashSet

</a:ExtendedAttributesText>
<c:Object1>
<o:Class Ref="o94"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o92"/>
</c:Object2>
</o:Association>
</c:Associations>
<c:Generalizations>
<o:Generalization Id="o36">
<a:ObjectID>B6004C6F-2D1C-49EA-AD0F-D9C32931BA94</a:ObjectID>
<a:Name>Generalisation_1</a:Name>
<a:Code>Generalisation_1</a:Code>
<a:CreationDate>1565266963</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266963</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o83"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o85"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o38">
<a:ObjectID>42AFD528-94FA-44E2-A3A1-EF8961FDA3EB</a:ObjectID>
<a:Name>Generalisation_2</a:Name>
<a:Code>Generalisation_2</a:Code>
<a:CreationDate>1565266966</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266966</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o83"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o84"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o41">
<a:ObjectID>FBDB2BDF-14E9-4D24-95D2-CD567FF8B520</a:ObjectID>
<a:Name>Generalisation_3</a:Name>
<a:Code>Generalisation_3</a:Code>
<a:CreationDate>1565266968</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565266968</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o83"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o86"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o76">
<a:ObjectID>1A1542A8-3DEE-4E32-A630-E3DF4B5366BD</a:ObjectID>
<a:Name>Generalisation_4</a:Name>
<a:Code>Generalisation_4</a:Code>
<a:CreationDate>1565330752</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330752</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o95"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o78">
<a:ObjectID>DD3E19C5-0DDF-4BFE-B143-E012201FB44C</a:ObjectID>
<a:Name>Generalisation_5</a:Name>
<a:Code>Generalisation_5</a:Code>
<a:CreationDate>1565330755</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330755</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o94"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o80">
<a:ObjectID>E2BF9A6D-3C2F-4711-9B18-6295E032E2EB</a:ObjectID>
<a:Name>Generalisation_6</a:Name>
<a:Code>Generalisation_6</a:Code>
<a:CreationDate>1565330759</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330759</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o91"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o82">
<a:ObjectID>44577F0C-3903-4E91-AE16-6251F104A3CD</a:ObjectID>
<a:Name>Generalisation_7</a:Name>
<a:Code>Generalisation_7</a:Code>
<a:CreationDate>1565330761</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565330761</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o93"/>
</c:Object2>
</o:Generalization>
<o:Generalization Id="o9">
<a:ObjectID>984D76F7-9467-42BB-BE3E-F47055DD57BB</a:ObjectID>
<a:Name>Generalisation_8</a:Name>
<a:Code>Generalisation_8</a:Code>
<a:CreationDate>1565351887</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351887</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<c:Object1>
<o:Class Ref="o102"/>
</c:Object1>
<c:Object2>
<o:Class Ref="o103"/>
</c:Object2>
</o:Generalization>
</c:Generalizations>
<c:TargetModels>
<o:TargetModel Id="o192">
<a:ObjectID>F4C13E6A-E330-4C48-88EC-BF21BC8BBB38</a:ObjectID>
<a:Name>Java</a:Name>
<a:Code>Java</a:Code>
<a:CreationDate>1565266741</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351144</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:TargetModelURL>file:///%_OBJLANG%/java5-j2ee14.xol</a:TargetModelURL>
<a:TargetModelID>0DEDDB90-46E2-45A0-886E-411709DA0DC9</a:TargetModelID>
<a:TargetModelClassID>1811206C-1A4B-11D1-83D9-444553540000</a:TargetModelClassID>
<c:SessionShortcuts>
<o:Shortcut Ref="o3"/>
</c:SessionShortcuts>
</o:TargetModel>
<o:TargetModel Id="o193">
<a:ObjectID>4E79EAB4-A01A-44DF-BBB0-7A466610819C</a:ObjectID>
<a:Name>WSDL for Java</a:Name>
<a:Code>WSDLJava</a:Code>
<a:CreationDate>1565266742</a:CreationDate>
<a:Creator>brunel-pc</a:Creator>
<a:ModificationDate>1565351145</a:ModificationDate>
<a:Modifier>brunel-pc</a:Modifier>
<a:TargetModelURL>file:///%_XEM%/WSDLJ2EE.xem</a:TargetModelURL>
<a:TargetModelID>C8F5F7B2-CF9D-4E98-8301-959BB6E86C8A</a:TargetModelID>
<a:TargetModelClassID>186C8AC3-D3DC-11D3-881C-00508B03C75C</a:TargetModelClassID>
<c:SessionShortcuts>
<o:Shortcut Ref="o4"/>
</c:SessionShortcuts>
</o:TargetModel>
</c:TargetModels>
</o:Model>
</c:Children>
</o:RootObject>

</Model>