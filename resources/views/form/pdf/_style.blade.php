<style type='text/css'>
*,
*::before,
*::after{
  box-sizing: border-box;
}

html{
  font-size: 13px;
}

body{
  margin: 0;
  padding: 0;
  font-size: 1rem;
  font-family: serif;
  background: white;
  color: black;
}

.sheet{
  overflow: hidden;
  position: relative;
  page-break-before: always;
}

.table{
  width: 100%;
  border-spacing: 0;
  border-collapse: collapse;
}

.table > thead > tr > th,
.table > tbody > tr > td{
  padding: .25rem 0;
  text-align: left;
}

.table.table-bordered > thead > tr > th,
.table.table-bordered > tbody > tr > td{
  padding: .5rem;
  border: solid 1px black;
}

.table.table-bordered > thead > tr.divider > th,
.table.table-bordered > tbody > tr.divider > td{
  padding: .15rem;
}

.hr{
  height: 1px;
  background-color: black;
}

.bg-accent{background-color: yellow !important;}
.bg-primary{background-color: orange !important;}

.fs-1{font-size: 2.75rem !important;}
.fs-2{font-size: 2.25rem !important;}
.fs-3{font-size: 1.75rem !important;}
.fs-4{font-size: 1.5rem !important;}
.fs-5{font-size: 1.25rem !important;}
.fs-6{font-size: 1rem !important;}

.pl-1{padding-left: .5rem !important;}
.pl-2{padding-left: .75rem !important;}
.pl-3{padding-left: 1.25rem !important;}
.pl-4{padding-left: 1.75rem !important;}
.pr-1{padding-right: .5rem !important;}
.pr-2{padding-right: .75rem !important;}
.pr-3{padding-right: 1.25rem !important;}
.pr-4{padding-right: 1.75rem !important;}
.pt-1{padding-top: .5rem !important;}
.pt-2{padding-top: .75rem !important;}
.pt-3{padding-top: 1.25rem !important;}
.pt-4{padding-top: 1.75rem !important;}
.pb-1{padding-bottom: .5rem !important;}
.pb-2{padding-bottom: .75rem !important;}
.pb-3{padding-bottom: 1.25rem !important;}
.pb-4{padding-bottom: 1.75rem !important;}

.text-bold{font-weight: bold !important;}
.text-italic{font-style: italic !important;}
.text-small{font-size: .875rem !important;}
.text-right{text-align: right !important;}
.text-center{text-align: center !important;}
.text-uppercase{text-transform: uppercase !important;}

.border-0{border: 0 !important;}
.border-left-0{border-left: 0 !important;}
.border-right-0{border-right: 0 !important;}
.border-top-0{border-top: 0 !important;}
.border-bottom-0{border-bottom: 0 !important;}
</style>