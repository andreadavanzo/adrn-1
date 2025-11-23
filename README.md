# ADRN-1: Quantifying Architectural Complexity in Modern PHP Frameworks

This repository is part of **Audax Development Research Notes - 1** and contains
the source code, logging utility, and automation scripts used to
calculate the **Accidental Complexity Score (ACS)** for six popular PHP frameworks.

The ACS is a novel metric introduced to quantify the **structural overhead** or
**Accidental Complexity (AC)** imposed by a framework during minimal execution,
relative to an Optimal Algorithmic Implementation (OAI).

## Repository Structure

The core components of the experimental setup are organized as follows:

| Directory | Description |
| :--- | :--- |
| `bash_script/` | Contains the primary **automation script** (`test.sh`) used to execute the tests across all frameworks. |
| `cesp/` | Houses the custom **Code Execution & Structure Profiler** (`cesp_log.php`), which collects the memory usage, execution time, and component counts (classes, interfaces, etc.). |
| `framework/` | Contains the minimal "Hello World" implementation for each of the **six target PHP frameworks** (CodeIgniter 4, Fat-Free, Laminas, Laravel, Symfony, Yii). |
| `test_log/` | The output directory where the raw **JSON log files** from the `cesp_log()` function are stored after execution. This directory contains the data used to generate the final ACS tables. |

## 🔗 Citation

This repository is linked to a permanent data archive for citation purposes:

**Data Archive DOI:** https://doi.org/10.5281/zenodo.17690007

**Related Paper:** https://doi.org/10.5281/zenodo.17690400